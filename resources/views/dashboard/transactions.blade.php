<x-dashboard.layout title_header="Produk">
    <div class="px-4 py-6 m-5 bg-white shadow rounded-xl">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold tracking-wide uppercase">Produk</h1>
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
                            Nama Pembeli
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Pembelian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            List Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Catatan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Snap Token
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $order)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50 ">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $order->pemesan->name }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $order->tgl_transaksi }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $order->alamat }}
                            </td>
                            <td class="px-6 py-4 min-w-52">
                                <ul>
                                    @foreach ($order->transaksi_items as $item)
                                        <li class="mb-1 list-disc">
                                            {{ $item->product->name }} ({{ $item->jumlah }})
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                Rp {{ number_format($order->transaksi_items->sum('harga'), 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->catatan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->snap_token }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $typeClass = match ($order->status) {
                                        'paid' => 'bg-green-100 text-green-800 border-green-400',
                                        'unpaid' => 'bg-yellow-100 text-yellow-800 border-yellow-400',
                                        default => 'bg-red-100 text-red-800 border-red-400',
                                    };
                                @endphp

                                <span
                                    class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm border uppercase {{ $typeClass }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" id="DropdownAll-button-{{ $order->id }}"
                                    data-dropdown-toggle="DropdownMenu-{{ $order->id }}" class="cursor-pointer">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M12 6h.01M12 12h.01M12 18h.01" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="DropdownMenu-{{ $order->id }}"
                                    class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            {{-- button delete --}}
                                            <form id="deleteForm{{ $order->id }}"
                                                action="{{ route('admin.transaksi.delete', $order->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" onclick="confirmDelete({{ $order->id }})"
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
