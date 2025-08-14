<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Stock;

class SupplierController extends Controller
{
    // list supplier
    public function index()
    {
        $supplier = Supplier::orderBy('created_at', 'desc')->with('products')->paginate(20);

        return view('dashboard.supplier', compact('supplier'));
    }

    // simpan supplier
    public function store(Request $request)
    {
        try {
            $validasi = $request->validate([
                'name' => ['string', 'required', 'min:3'],
                'no_wa' => ['string', 'required', 'max:13'],
                'products.*.name' => ['string', 'required', 'min:3'],
                'products.*.harga' => ['numeric', 'required'],
                'products.*.photo' => ['string', 'required'],
                'products.*.type' => ['required'],
                'products.*.satuan' => ['required'],
                'products.*.jumlah' => ['required', 'numeric', 'min:1'],
                'products.*.tgl_masuk' => ['required']
            ]);

            DB::beginTransaction();

            // simpan data supplier
            $supplier = Supplier::create([
                'name' => $validasi['name'],
                'no_wa' => $validasi['no_wa']
            ]);

            $supplier_id = $supplier->id;

            // Simpan produk satu per satu
            foreach ($validasi['products'] as $productData) {
                $product = $supplier->products()->create([
                    'supplier_id' => $supplier_id,
                    'name' => $productData['name'],
                    'harga' => $productData['harga'],
                    'photo' => $productData['photo'],
                    'type' => $productData['type'],
                    'satuan' => $productData['satuan'],
                ]);

                // Simpan stok untuk produk tersebut
                Stock::create([
                    'product_id' => $product->id,
                    'jumlah' => $productData['jumlah'],
                    'tgl_masuk' => $productData['tgl_masuk']
                ]);
            }

            DB::commit();
            return redirect()->route('admin.suppliers')->with('success', 'Berhasil menambahkan supplier!');
        } catch (\Throwable $e) {

            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan supplier' . $e->getMessage());
        }
    }

    // detail supplier
    public function show($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);

            return view('pages.suppliers.index', [
                'supplier' => $supplier,
                'modalSupplier' => true
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Data supplier tidak ditemukan');
        }
    }

    // update supplier
    public function update(Request $request, $id)
    {
        try {
            $supplier = Supplier::findOrFail($id);

            $validasi = $request->validate([
                'name' => ['string', 'required', 'min:3'],
                'no_wa' => ['string', 'required', 'max:13'],
            ]);

            DB::beginTransaction();

            $supplier->update($validasi);

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil memperbarui supplier');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui supplier' . $e->getMessage());
        }
    }

    // hapus supplier
    public function destroy($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);

            // cari dahulu apakah supplier masih terikat dengan produk
            $product = Product::where('supplier_id', $id)->first();
            if ($product) {
                return redirect()->back()->with('error', 'Supplier masih terikat dengan produk');
            }

            DB::beginTransaction();

            $supplier->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menghapus supplier');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus supplier');
        }
    }
}
