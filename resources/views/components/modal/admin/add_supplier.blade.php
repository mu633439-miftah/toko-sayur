<x-modal.template id_modal="add-supplier" title="Tambah Supplier" max_width="max-w-6xl">
    <form id="formSupplier" method="POST" action="{{ route('admin.supplier.store') }}" class="p-4 md:p-5">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-4">
            {{-- name --}}
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Supplier</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Type supplier name" required>
            </div>

            {{-- no wa --}}
            <div class="col-span-2">
                <label for="no_wa" class="block mb-2 text-sm font-medium text-gray-900">Nomor Whatsapp</label>
                <input type="text" name="no_wa" id="no_wa" value="{{ old('no_wa') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="08xxxxxxxx" required minlength="10" maxlength="13">
            </div>
        </div>

        {{-- Products dynamic --}}
        <div class="col-span-2">
            <label class="block mb-2 text-sm font-medium text-gray-900">Daftar Produk</label>
            <div id="products-wrapper" class="space-y-4">
                {{-- template produk pertama --}}
            </div>
            <button type="button" id="add-product"
                class="px-3 py-2 mt-4 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">+
                Tambah Produk</button>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="text-white inline-flex items-center bg-primary hover:bg-emerald-600 cursor-pointer focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Simpan
            </button>
        </div>
    </form>

    {{-- Template produk --}}
    <x-dashboard.product-input />
</x-modal.template>


<script>
    const wrapper = document.getElementById('products-wrapper');
    const addBtn = document.getElementById('add-product');
    const template = document.getElementById('product-template').content;
    let productIndex = 0;

    function addProductItem() {
        const clone = document.importNode(template, true);

        // Ubah semua name di dalam template
        clone.querySelectorAll('[name]').forEach(input => {
            const baseName = input.getAttribute('name') || '';
            const fieldMatch = baseName.match(/\[\]\[(.+?)\]/); // contoh: products[][name]
            if (fieldMatch) {
                const fieldName = fieldMatch[1];
                input.setAttribute('name', `products[${productIndex}][${fieldName}]`);
            }
        });

        // Tambah ke wrapper
        wrapper.appendChild(clone);
        productIndex++;
    }

    // Tambahkan satu produk awal saat halaman dimuat
    addProductItem();

    // Event tambah produk
    addBtn.addEventListener('click', () => {
        addProductItem();
    });

    // Event hapus produk
    wrapper.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-product')) {
            e.target.closest('.product-item').remove();
        }
    });
</script>
