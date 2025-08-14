<template id="product-template">
    <div class="p-4 mb-6 border border-gray-300 rounded-lg shadow product-item" data-index="">
        <div class="flex items-center justify-between w-full mb-5">
            <h6 class="text-base font-semibold text-gray-700 title-product">Produk</h6>
            <button type="button"
                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 remove-product">Hapus</button>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            {{-- product name --}}
            <div>
                <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900">Nama
                    Produk</label>
                <input type="text" name="products[][name]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan Nama Produk" required>
            </div>

            {{-- product price --}}
            <div>
                <label for="product_price" class="block mb-2 text-sm font-medium text-gray-900">Harga
                    Produk</label>
                <input type="number" name="products[][harga]" min="1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan Harga Produk" required>
            </div>

            {{-- product photo --}}
            <div>
                <div class="image-upload-component">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Foto Produk</label>
                    <span class="text-xs text-red-500 italic">*Silahkan ganti / upload foto di menu produk</span>
                    <input type="hidden" name="products[][photo]" value="default-image" class="image-url">
                </div>
            </div>

            {{-- product type --}}
            <div>
                <label for="product_type" class="block mb-2 text-sm font-medium text-gray-900">Tipe Produk</label>
                <select id="product_type" name="products[][type]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                    required>
                    <option selected="" disabled="">Select Tipe Produk</option>
                    <option value="sayur">Sayur</option>
                    <option value="buah">Buah</option>
					<option value="daging">Daging</option>
					<option value="ikan">Ikan</option>
					<option value="bumbu dapur">Bumbu Dapur</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            {{-- product satuan --}}
            <div>
                <label for="product_satuan" class="block mb-2 text-sm font-medium text-gray-900">Satuan Produk</label>
                <select id="product_satuan" name="products[][satuan]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                    required>
                    <option selected="" disabled="">Select Satuan Produk</option>
                    <option value="kilogram">Kilogram</option>
					<option value="setengah">Setengah</option>
					<option value="seperempat">Seperempat</option>
					<option value="iket">Iket</option>
                    <option value="pcs">PCS</option>
                </select>
            </div>

            {{-- product jumlah --}}
            <div>
                <label for="product_jumlah" class="block mb-2 text-sm font-medium text-gray-900">Jumlah
                    Produk</label>
                <input type="number" name="products[][jumlah]" min="1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Masukkan Harga Produk" required>
            </div>

            {{-- product tgl_masuk --}}
            <div>
                <label for="tgl_masuk" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Masuk
                    Produk</label>
                <input type="date" name="products[][tgl_masuk]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
            </div>
        </div>
    </div>
</template>
