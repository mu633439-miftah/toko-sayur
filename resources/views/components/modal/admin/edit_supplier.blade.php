@props(['id_supplier', 'supplier'])

<x-modal.template id_modal="edit-supplier-{{ $id_supplier }}" title="Edit Supplier">
    <!-- Modal body -->
    <form class="p-4 md:p-5" action="{{ route('admin.supplier.update', $id_supplier) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4 mb-4">
            {{-- name --}}
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Supplier</label>
                <input type="text" name="name" id="name" value="{{ old('name', $supplier->name) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="Masukkan Nama Supplier" required="">
            </div>

            {{-- no wa --}}
            <div class="col-span-2">
                <label for="no_wa" class="block mb-2 text-sm font-medium text-gray-900 ">Nomor Whatsapp</label>
                <input type="text" name="no_wa" id="no_wa" value="{{ old('no_wa', $supplier->no_wa) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="08xxxxxxxx" required="" minlength="10" maxlength="13">
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
