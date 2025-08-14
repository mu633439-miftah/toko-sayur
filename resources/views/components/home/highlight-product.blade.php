@props(['products'])

<section id="product" class="px-10 py-20 text-white bg-primary">
    <div class="text-center">
        <h1 class="text-5xl font-bold tracking-wider">Katalog Produk</h1>
        <span class="text-base font-light leading-tight tracking-tight text-lightPrimary">Lihat semua produk
            kami disini!</span>
    </div>


    {{-- card produk --}}
    <div class="grid grid-cols-1 gap-4 mt-16 sm:grid-cols-2 md:grid-cols-4">
        @foreach ($products->take(8) as $product)
            @php
                $colorBadge = $product->type == 'sayur'
								? 'bg-green-100 text-green-800'
								: ($product->type == 'buah'
									? 'bg-yellow-100 text-yellow-800'
									: ($product->type == 'daging'
										? 'bg-orange-100 text-orange-800'
										: ($product->type == 'ikan'
											? 'bg-indigo-100 text-indigo-800'
											: ($product->type == 'bumbu dapur'
												? 'bg-purple-100 text-purple-800'
												: 'bg-blue-100 text-blue-800'))));
            @endphp
            <x-home.product-card image="{{ $product->photo }}" title="{{ $product->name }}"
                product_id="{{ $product->id }}" price="{{ $product->harga }}" satuan="{{ $product->satuan }}">
                <span
                    class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm {{ $colorBadge }}">{{ $product->type }}</span>
            </x-home.product-card>
        @endforeach
    </div>

    <div class="flex justify-center w-full mt-10">
        <a href="{{ route('products') }}"
            class=" text-white hover:text-primary border border-white hover:bg-white font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer flex items-center gap-1">
            <span>Lihat
                produk selengkapnya</span>

            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 12H5m14 0-4 4m4-4-4-4" />
            </svg>

        </a>
    </div>
</section>
