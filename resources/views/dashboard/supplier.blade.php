<x-dashboard.layout title_header="Supplier">
    <div class="px-4 py-6 m-5 bg-white shadow rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold tracking-wide uppercase">Supplier</h1>

            {{-- button add --}}
            <button type="button" data-modal-target="add-supplier" data-modal-toggle="add-supplier"
                class="text-primary hover:text-white border border-green-700 hover:bg-primary focus:ring-4 focus:outline-none focus:ring-lightPrimary font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 mb-2 cursor-pointer flex items-center gap-1">

                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>

                <span>Tambah
                    Supplier</span>
            </button>
        </div>

        {{-- table supplier --}}
        <div class="mt-10 overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Supplier
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nomor Whatsapp
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Daftar Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier as $sup)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4 font-medium">
                                {{ $sup->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $sup->no_wa }}
                            </td>
                            <td class="px-6 py-4">
                                <ul>
                                    @foreach ($sup->products as $product)
                                        <li class="mb-1 list-disc">
                                            {{ $product->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" id="DropdownAll-button-{{ $sup->id }}"
                                    data-dropdown-toggle="DropdownMenu-{{ $sup->id }}" class="cursor-pointer">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M12 6h.01M12 12h.01M12 18h.01" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="DropdownMenu-{{ $sup->id }}"
                                    class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            {{-- button edit --}}
                                            <button type="button" data-modal-target="edit-supplier-{{ $sup->id }}"
                                                data-modal-toggle="edit-supplier-{{ $sup->id }}"
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
                                            {{-- button delete --}}
                                            <form id="deleteForm{{ $sup->id }}"
                                                action="{{ route('admin.supplier.delete', $sup->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" onclick="confirmDelete({{ $sup->id }})"
                                                    class="text-red-500 w-[90%] hover:text-white border border-red-500 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-100 font-medium rounded-lg text-sm px-5 py-1.5 text-center m-3 mx-auto cursor-pointer flex items-center gap-1">

                                                    <svg class="w-6 h-6" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
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
<x-modal.admin.add_supplier />
@foreach ($supplier as $sup)
    <x-modal.admin.edit_supplier :id_supplier="$sup->id" :supplier="$sup" />
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
