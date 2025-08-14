@props(['id_product', 'name_product'])

<x-modal.template id_modal="balance-{{ $id_product }}" title="Balance Stok Produk ({{ $name_product }})">
    <!-- Modal body -->
    <form class="p-4 md:p-5" action="{{ route('admin.product.update-balance', $id_product) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- balance --}}
        <div class="mb-3">
            <p class="mb-2 text-xs text-gray-500">*Masukkan Penambahan Stok (+ atau positif) atau Pengurangan Stok (-
                atau minus).
                ex: -10 (Pengurangan 10 Stok) atau 10 (Penambahan 10 Stok)</p>
            <label for="balance" class="block mb-2 text-sm font-medium text-gray-900 ">balance</label>
            <input type="number" name="balance" id="balance" value="{{ old('balance') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                required="">
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
