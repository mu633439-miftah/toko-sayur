<x-home.layout title_header="Toko Sayur">
    <div class="mt-32 px-10">
        <header class="text-center">
            <h1 class="text-5xl font-bold tracking-wider">Daftar <span class="text-primary">Transaksi dan Histori</span>
            </h1>
            <span class="text-lg mt-2 block font-light tracking-wider">Lihat Semua Transaksi Kamu Disini.</span>
        </header>

        <div class="mt-10">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white ">
                        Transaksi & Histori
                        <p class="mt-1 text-sm font-normal text-gray-500">Lihat Semua Transaksi & Histori Kamu Disini.
                            Pastikan untuk Selalu Membayar Semua Tagihan dari Belanjaan Kamu.</p>
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                List Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pembelian
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Catatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($transactions as $transaksi)
                            <tr class="bg-white border-b  border-gray-200">
                                <th class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <ul>
                                        @foreach ($transaksi->transaksi_items as $item)
                                            <li class="mb-1 list-disc">
                                                {{ $item->product->name }} ({{ $item->jumlah }})
                                            </li>
                                        @endforeach
                                    </ul>
                                </th>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($transaksi->tgl_transaksi)->translatedFormat('d F Y H:i') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $transaksi->catatan ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($transaksi->total, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $typeClass = match ($transaksi->status) {
                                            'paid' => 'bg-green-100 text-green-800 border-green-400',
                                            'unpaid' => 'bg-yellow-100 text-yellow-800 border-yellow-400',
                                            default => 'bg-red-100 text-red-800 border-red-400',
                                        };
                                    @endphp

                                    <span
                                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm border uppercase {{ $typeClass }}">
                                        {{ $transaksi->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 flex justify-center items-center">
                                    {{-- payment --}}
                                    <button type="button" data-snap-token="{{ $transaksi->snap_token ?? '' }}"
                                        data-transaksi-id="{{ $transaksi->id }}"
                                        @if ($transaksi->status == 'paid' || $transaksi->status == 'failed') disabled @endif
                                        class="pay-button text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 disabled:opacity-50 disabled:cursor-not-allowed">Bayar
                                        Sekarang</button>

                                    {{-- canceled --}}
                                    <form id="formCancel-{{ $transaksi->id }}"
                                        action="{{ route('transaksi.cancel', $transaksi->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="button" onclick="confirmCancel({{ $transaksi->id }})"
                                            @if ($transaksi->status == 'paid' || $transaksi->status == 'failed') disabled @endif
                                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 disabled:opacity-50 disabled:cursor-not-allowed">Batalkan</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="loadingOverlay" class="fixed inset-0 z-50 items-center justify-center hidden bg-[rgba(0,0,0,0.5)]">
        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
            <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
</x-home.layout>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
<script>
    const payButtons = document.querySelectorAll('.pay-button');

    payButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const transaksiId = this.dataset.transaksiId;
            let snapToken = this.dataset.snapToken;

            // function startSnap(token)
            const startSnap = (token) => {
                snap.pay(token, {
                    onSuccess: function(result) {
                        // loading
                        document.getElementById('loadingOverlay').classList.remove(
                            'hidden');
                        document.getElementById('loadingOverlay').classList.add('flex');

                        fetch(`${window.location.origin}/transaksi/pay/status`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content'),
                                },
                                body: JSON.stringify({
                                    result: result,
                                    statusTransaksi: "paid"
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                window.location.href = data.error ?
                                    `/transactions?status=error` :
                                    `/transactions?status=success`;
                            })
                            .catch(error => {
                                console.error(error);
                                window.location.href = `/transactions?status=error`;
                            });
                    },
                    onPending: function(result) {
                        window.location.href = `/transactions?status=pending`;
                    },
                    onError: function(result) {
                        fetch(`${window.location.origin}/transaksi/pay/status`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content'),
                                },
                                body: JSON.stringify({
                                    result: result,
                                    statusTransaksi: "failed"
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                window.location.href = data.error ?
                                    `/transactions?status=error` :
                                    `/transactions?status=failed`;
                            })
                            .catch(error => {
                                console.error(error);
                                window.location.href = `/transactions?status=error`;
                            });
                    }
                });
            };

            // Cek apakah sudah ada Snap Token
            if (!snapToken || snapToken.trim() === "") {
                // Ambil dari server
                fetch(`/transaksi/pay/${transaksiId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (!data.success || !data.snap_token) {
                            throw new Error(data.message || 'Gagal mengambil Snap Token');
                        }

                        // Simpan snap token ke data attribute agar bisa dipakai lagi
                        this.dataset.snapToken = data.snap_token;

                        // Jalankan Snap
                        startSnap(data.snap_token);
                    })
                    .catch(error => {
                        console.error(error);
                        alert("Gagal mengambil Snap Token. Silakan coba lagi.");
                    });
            } else {
                // Sudah ada snap token, langsung jalankan Snap
                startSnap(snapToken);
            }
        });
    });
</script>

<script>
    function confirmCancel(transactionId) {
        Swal.fire({
            title: 'Batalkan Transaksi?',
            text: 'Apakah Anda yakin ingin membatalkan transaksi ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, batalkan',
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('formCancel-' + transactionId);

                form.submit();
            }
        });
    }
</script>
