@props(['penjualan', 'produk', 'user', 'supplier'])

<div class="grid grid-cols-1 gap-4 mt-10 md:grid-cols-4">
    {{-- card penjualan --}}
    <div class="p-4 border-2 rounded-lg border-slate-200">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <span class="text-lg font-bold leading-none text-primary sm:text-xl">Rp
                    {{ number_format($penjualan, 0, ',', '.') }}</span>
                <h3 class="text-sm font-normal text-gray-500">Total Penjualan / Omset Hari Ini</h3>
            </div>
        </div>
    </div>

    {{-- card total stok terjual --}}
    <div class="p-4 border-2 rounded-lg border-slate-200">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <span class="text-lg font-bold leading-none text-orange-400 sm:text-xl">{{ $produk }} Produk</span>
                <h3 class="text-sm font-normal text-gray-500">Jumlah Jenis Produk</h3>
            </div>
        </div>
    </div>

    {{-- card user --}}
    <div class="p-4 border-2 rounded-lg border-slate-200">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <span class="text-lg font-bold leading-none text-blue-500 sm:text-xl">{{ $user }} User</span>
                <h3 class="text-sm font-normal text-gray-500">Jumlah User Terdaftar</h3>
            </div>
        </div>
    </div>

    {{-- card user --}}
    <div class="p-4 border-2 rounded-lg border-slate-200">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <span class="text-lg font-bold leading-none text-yellow-400 sm:text-xl">{{ $supplier }}
                    Supplier</span>
                <h3 class="text-sm font-normal text-gray-500">Jumlah Supplier Terdaftar</h3>
            </div>
        </div>
    </div>
</div>
