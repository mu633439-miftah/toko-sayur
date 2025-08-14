<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use App\Models\Product;

class ProductController extends Controller
{
    // Tampilkan semua produk dengan stok-nya
    public function index()
    {
        $products = Product::with('stock', 'suppliers')->orderBy('created_at', 'desc')->paginate(20);
        $suppliers = Supplier::all();

        return view('dashboard.products', compact('products', 'suppliers'));
    }

    // list product untuk user
    public function listProduct()
    {
        $query = Product::orderBy('created_at', 'desc');
        $products = $query->get();

        return view('pages.products', [
            'products' => $products
        ]);
    }


    // cart untuk user
    public function cart()
    {
        $query = Product::orderBy('created_at', 'desc');
        $products = $query->get();

        return view('pages.cart', [
            'products' => $products
        ]);
    }


    // Tampilkan detail satu produk
    public function show($id)
    {
        $product = Product::with('stock')->findOrFail($id);
        return view('products.show', [
            'product' => $product,
            'showModal' => true
        ]);
    }

    // simpan data product
    public function store(Request $request)
    {

        try {
            // dd($request->all());
            $validasi = $request->validate([
                'name' => ['string', 'required', 'min:3'],
                'harga' => ['numeric', 'required'],
                'photo' => ['string', 'required'],
                'type' => ['required'],
                'satuan' => ['required',],
                'jumlah' => ['required', 'numeric', 'min:1'],
                'tgl_masuk' => ['required'],
                'supplier' => ['required']
            ]);

            // dd($validasi);

            DB::beginTransaction();

            $product = Product::create([
                'name' => $validasi['name'],
                'harga' => $validasi['harga'],
                'photo' => $validasi['photo'],
                'type' => $validasi['type'],
                'satuan' => $validasi['satuan'],
                'supplier_id' => $validasi['supplier']
            ]);

            Stock::create([
                'product_id' => $product->id,
                'jumlah' => $validasi['jumlah'],
                'tgl_masuk' => $validasi['tgl_masuk']
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menambahkan produk!');
        } catch (\Throwable $e) {

            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan produk' . $e->getMessage());
        }
    }

    // Update produk dan stok-nya
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['string', 'required', 'min:3'],
            'harga' => ['numeric', 'required'],
            'photo' => ['string', 'required'],
            'type' => ['required', 'in:sayur,buah,daging,ikan,bumbu dapur,lainnya'],
            'satuan' => ['required', 'in:kilogram,setengah,seperempat,iket,pcs'],
            'jumlah' => ['required', 'numeric', 'min:1'],
            'tgl_masuk' => ['required', 'date'],
            'supplier' => ['required']
        ]);

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $product->update([
                'name' => $request->name,
                'harga' => $request->harga,
                'photo' => $request->photo,
                'type' => $request->type,
                'satuan' => $request->satuan,
                'supplier_id' => $request->supplier
            ]);

            $stock = $product->stock;
            if ($stock) {
                $stock->update([
                    'jumlah' => $request->jumlah,
                    'tgl_masuk' => $request->tgl_masuk,
                ]);
            } else {
                Stock::create([
                    'product_id' => $product->id,
                    'jumlah' => $request->jumlah,
                    'tgl_masuk' => $request->tgl_masuk,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.products')->with('success', 'Produk berhasil diperbarui!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memperbarui produk' . $e->getMessage());
        }
    }

    // Hapus produk dan stok-nya
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            // Hapus stok dulu jika ada
            if ($product->stock) {
                $product->stock->delete();
            }

            // Hapus produk
            $product->delete();

            DB::commit();
            return redirect()->route('admin.products')->with('success', 'Produk berhasil dihapus!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus produk');
        }
    }

    // balance product
    public function updateBalance(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $balance = $product->stock->jumlah + $request->balance;

            $product->stock->update([
                'jumlah' => $balance
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Stok berhasil diperbarui!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memperbarui stok');
        }
    }
}
