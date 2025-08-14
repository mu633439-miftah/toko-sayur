<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Transaction_item;
use App\Services\MidtransService;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // ambil list order untuk admin
    public function listOrder()
    {
        $orders = Transaction::with(['pemesan', 'transaksi_items'])
            ->whereIn('status', ['unpaid', 'failed'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.orders', compact('orders'));
    }

    // ambil list transaksi untuk admin
    public function listTransaksi()
    {
        $transaksi = Transaction::with(['pemesan', 'transaksi_items'])
            ->where('status', 'paid')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.transactions', compact('transaksi'));
    }

    // store transaksi
    public function storeTransaksi(MidtransService $midtransService, Request $request)
    {
        try {
            // dd($request->all());
            $validasi = $request->validate([
                'total' => ['required', 'numeric'],
                'catatan' => ['string', 'min:3'],
                'alamat' => ['string', 'min:3'],
                'products.*.product_id' => ['required', 'numeric'],
                'products.*.jumlah' => ['required', 'numeric'],
                'products.*.harga' => ['required', 'numeric']
            ]);

            // dd($validasi);

            DB::beginTransaction();

            $transaksi = Transaction::create([
                'user_id' => Auth::id(),
                'status' => 'unpaid',
                'total' => $validasi['total'],
                'catatan' => $validasi['catatan'],
                'alamat' => $validasi['alamat'],
                'snap_token' => null,
                'tgl_transaksi' => now(),
            ]);


            foreach ($validasi['products'] as $items) {
                Transaction_item::create([
                    'transaction_id' => $transaksi->id,
                    'product_id' =>  $items['product_id'],
                    'jumlah' => $items['jumlah'],
                    'harga' => $items['jumlah'],
                ]);
            }

            DB::commit();
            return redirect()->route('transactions')->with('checkout', 'Berhasil melakukan checkout. Silahkan melakukan pembayaran untuk menyelesaikan transaksi.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Gagal melakukan checkout' . $e->getMessage());
        }
    }

    // list transaksi user
    public function listTransaksiUser()
    {
        $transactions = Transaction::with(['pemesan', 'transaksi_items'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.transactions', compact('transactions'));
    }

    // bayar checkout
    public function payTransaksi(MidtransService $midtransService, $transaksi_id)
    {
        try {
            DB::beginTransaction();

            $snapToken = $midtransService->createSnapToken($transaksi_id);

            $transaksi = Transaction::findOrFail($transaksi_id);
            $transaksi->update([
                'user_id' => Auth::id(),
                'snap_token' => $snapToken
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Token Midtrans berhasil dibuat',
                'snap_token' => $snapToken
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat token Midtrans',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    // update status transaksi
    public function updateStatusTransaksi(Request $request)
    {
        try {
            $status = $request->input('statusTransaksi');
            $result = (object) $request->input('result'); // Cast ke object biar bisa pakai ->

            $transaksi_id = $result->order_id;

            DB::beginTransaction();

            $transaksi = Transaction::where('id', $transaksi_id)->firstOrFail();
            $transaksi->update([
                'status' => $status
            ]);

            DB::commit();

            return response()->json(['message' => 'Status transaksi berhasil diperbarui.']);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui status transaksi.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // cancel transaksi
    public function cancelTransaksi($transaksi_id)
    {
        try {
            DB::beginTransaction();

            $transaksi = Transaction::where('id', $transaksi_id)->firstOrFail();
            $transaksi->update([
                'status' => 'failed'
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Transaksi berhasil dibatalkan.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membatalkan transaksi.');
        }
    }

    // delete transaksi
    public function destroy($transaksi_id)
    {
        try {
            DB::beginTransaction();

            $transaksi = Transaction::where('id', $transaksi_id)->firstOrFail();
            $transaksi->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Transaksi berhasil dihapus.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus transaksi.' . $e->getMessage());
        }
    }
}
