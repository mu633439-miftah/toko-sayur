<x-dashboard.layout title_header="Produk">
    <div class="px-4 py-6 m-5 bg-white shadow rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold tracking-wide uppercase">Produk</h1>

            {{-- button add --}}
            <button type="button" data-modal-target="add-product" data-modal-toggle="add-product"
                class="text-primary hover:text-white border border-green-700 hover:bg-primary focus:ring-4 focus:outline-none focus:ring-lightPrimary font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 mb-2 cursor-pointer flex items-center gap-1">

                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>

                <span>Tambah
                    Produk</span>
            </button>
        </div>

        {{-- table produk --}}
        <div class="mt-10 overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Supplier
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stok
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 ">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $product->name }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $product->suppliers->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->stock->jumlah }}
                            </td>
                            <td class="px-6 py-4">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ $product->photo }}" alt="background" class="h-20 rounded-lg shadow">
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $typeClass = match ($product->type) {
                                        'sayur' => 'bg-green-100 text-green-800 border-green-400',
                                        'buah' => 'bg-yellow-100 text-yellow-800 border-yellow-400',
										'daging' => 'bg-orange-100 text-orange-800 border-orange-400',
										'ikan' => 'bg-indigo-100 text-indigo-800 border-indigo-400',
										'bumbu dapur' => 'bg-purple-100 text-purple-800 border-purple-400',
                                        default => 'bg-red-100 text-red-800 border-red-400',
                                    };
                                @endphp

                                <span
                                    class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm border uppercase {{ $typeClass }}">
                                    {{ $product->type }}
                                </span>

                            </td>
                            <td class="px-6 py-4">
                                <button type="button" id="DropdownAll-button-{{ $product->id }}"
                                    data-dropdown-toggle="DropdownMenu-{{ $product->id }}" class="cursor-pointer">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M12 6h.01M12 12h.01M12 18h.01" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="DropdownMenu-{{ $product->id }}"
                                    class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            {{-- button edit --}}
                                            <button type="button" data-modal-target="edit-product-{{ $product->id }}"
                                                data-modal-toggle="edit-product-{{ $product->id }}"
                                                class="text-orange-400 w-[90%] hover:text-white border border-orange-400 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-orange-100 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-3 mx-auto cursor-pointer flex items-center gap-1">

                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                </svg>
                                                <span>Edit</span>
                                            </button>
                                        </li>
                                        <li>
                                            {{-- button balance produk --}}
                                            <button type="button" data-modal-target="balance-{{ $product->id }}"
                                                data-modal-toggle="balance-{{ $product->id }}"
                                                class="text-primary w-[90%] hover:text-white border border-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-orange-100 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-3 mx-auto cursor-pointer flex items-center gap-1">
                                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                                    </path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                                    </path>
                                                </svg>
                                                <span>Balance Produk</span>
                                            </button>
                                        </li>
                                        <li>
                                            {{-- button delete --}}
                                            <form id="deleteForm{{ $product->id }}"
                                                action="{{ route('admin.product.delete', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" onclick="confirmDelete({{ $product->id }})"
                                                    class="text-red-500 w-[90%] hover:text-white border border-red-500 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-100 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-3 mx-auto cursor-pointer flex items-center gap-1">

                                                    <svg class="w-6 h-6" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                    </svg>

                                                    <span>Delete</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard.layout>

{{-- modal --}}
<x-modal.admin.add_product :suppliers="$suppliers" />
@foreach ($products as $product)
    <x-modal.admin.edit_product :id_product="$product->id" :product="$product" :suppliers="$suppliers" />
    <x-modal.admin.balance_product :id_product="$product->id" :name_product="$product->name" />
@endforeach


<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data ini akan dihapus permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika user klik "Hapus", kirim form-nya
                document.getElementById('deleteForm' + id).submit();
            }
        });
    }
</script>
