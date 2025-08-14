@props(['suppliers'])

<x-modal.template id_modal="add-product" title="Tambah Produk">
    <!-- Modal body -->
    <form class="p-4 md:p-5" action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-4">
            {{-- name --}}
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Produk</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="Type product name" required="">
            </div>

            {{-- supplier --}}
            <div class="col-span-2">
                <label for="supplier" class="block mb-2 text-sm font-medium text-gray-900">Supplier</label>
                <select id="supplier" name="supplier"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option selected="" disabled="">Select supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- harga --}}
            <div class="col-span-2">
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 ">Harga</label>
                <input type="number" min="1" name="harga" id="harga" value="{{ old('harga') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    required="" placeholder="Rp ">
            </div>

            {{-- photo --}}
            <div class="col-span-2">
                <x-dashboard.image-upload name="photo" />
            </div>

            {{-- type --}}
            <div class="col-span-2">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Tipe Produk</label>
                <select id="type" name="type" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option selected="" disabled="">Select Tipe Produk</option>
                    <option value="sayur">Sayur</option>
                    <option value="buah">Buah</option>
					<option value="daging">Daging</option>
					<option value="ikan">Ikan</option>
					<option value="bumbu dapur">Bumbu Dapur</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            {{-- jumlah --}}
            <div class="col-span-2">
                <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 ">jumlah Produk</label>
                <input type="number" min="1" name="jumlah" id="jumlah" value="{{ old('jumlah') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    required="" placeholder="0">
            </div>

            {{-- satuan --}}
            <div class="col-span-2">
                <label for="satuan" class="block mb-2 text-sm font-medium text-gray-900">Satuan</label>
                <select id="satuan" name="satuan" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option selected="" disabled="">Select Satuan</option>
                    <option value="kilogram">Kilogram</option>
					<option value="setengah">Setengah</option>
					<option value="seperempat">Seperempat</option>
					<option value="iket">iket</option>
                    <option value="pcs">PCS</option>
                </select>
            </div>

            {{-- product tgl_masuk --}}
            <div class="col-span-2">
                <label for="tgl_masuk" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Masuk
                    Produk</label>
                <input type="date" name="tgl_masuk" id="tgl_masuk" value="{{ old('tgl_masuk') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
            </div>

        </div>

        <button type="submit"
            class="text-white inline-flex items-center bg-primary hover:bg-emerald-600 cursor-pointer focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Simpan
        </button>
    </form>
</x-modal.template>
