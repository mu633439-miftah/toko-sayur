<x-dashboard.layout title_header="Dashboard">
    <div class="px-4 py-6 m-5 bg-white shadow rounded-xl">
        <h1 class="text-2xl font-bold tracking-wide uppercase">Dashboard</h1>

        {{-- card summary --}}
        <x-dashboard.card-summary :penjualan="$sumPenjualanDay" :produk="$jumlahProduk" :user="$jumlahUser" :supplier="$jumlahSupplier" />

        {{-- selamat datang --}}
        <div class="border-black/12.5 mt-5 shadow-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-gray-700 bg-center bg-no-repeat bg-cover bg-blend-multiply h-[70vh] bg-clip-border pt-28 min-h-[40vh]"
            style="background-image: url('/images/background.jpg')">
            <div
                class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0 text-center h-full mx-auto max-w-6xl">
                <h6 class="mb-3 text-2xl font-bold tracking-wider text-white md:text-5xl text-shadow-md">
                    Selamat Datang
                    Admin di Dashboard <span class="text-lightPrimary">Toko Sayur</span></h6>
                <p class="mt-1 text-base font-light md:text-lg text-lightPrimary">Mari kelola transaksi yang masuk dan
                    kelola produk dengan baik.</p>
            </div>
        </div>
    </div>
</x-dashboard.layout>
