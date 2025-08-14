<x-home.layout title_header="Produk">
    <div class="mt-32 px-10">
        <header class="text-center">
            <span class="text-sm font-light tracking-wider">Lihat Semua Daftar Produk Kami Disini.</span>
            <h1 class="text-5xl font-bold tracking-wider">Daftar <span class="text-primary">Produk</span></h1>
            <h2 class="text-xl text-gray-700">Tertarik? Masukkan keranjang dan belanja sekarang!</h2>
        </header>


        {{-- search --}}
        <form class="max-w-xl mx-auto my-10">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="product-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary focus:border-primary"
                    placeholder="Cari produk disini..." required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-primary hover:bg-emerald-600 focus:ring-4 focus:outline-none focus:ring-lightPrimary font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>



        <!-- Filter Buttons -->
        <div class="flex gap-4 mb-4 font-semibold text-gray-700 mt-10">
            <button class="tab-button cursor-pointer text-green-600" data-index="0">All</button>
            <button class="tab-button cursor-pointer" data-index="1">Sayur</button>
            <button class="tab-button cursor-pointer" data-index="2">Buah</button>
			<button class="tab-button cursor-pointer" data-index="3">Daging</button>
			<button class="tab-button cursor-pointer" data-index="4">Ikan</button>
			<button class="tab-button cursor-pointer" data-index="5">Bumbu Dapur</button>
            <button class="tab-button cursor-pointer" data-index="6">Lainnya</button>
        </div>

        <!-- Scroll Container -->
        <div id="tab-container"
            class="flex overflow-x-hidden scroll-smooth snap-x snap-mandatory w-full h-auto transition-all duration-500">

            <!-- Tab: All -->
            <div class="min-w-full snap-start p-4">
                <h2 class="text-xl font-bold mb-5">Semua Produk</h2>
                {{-- tampilkan semua produk --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                    @foreach ($products as $product)
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
                        <div class="product-card" data-name="{{ Str::lower($product->name) }}">
                            <x-home.product-card image="{{ $product->photo }}" title="{{ $product->name }}"
                                product_id="{{ $product->id }}" price="{{ $product->harga }}"
                                satuan="{{ $product->satuan }}">
                                <span
                                    class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm {{ $colorBadge }}">{{ $product->type }}</span>
                            </x-home.product-card>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Tab: Sayur -->
            <div class="min-w-full snap-start p-4">
                <h2 class="text-xl font-bold mb-2">Sayur</h2>
                {{-- tampilkan produk Sayur --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                    @foreach ($products as $product)
                        @if ($product->type === 'sayur')
                            <div class="product-card" data-name="{{ Str::lower($product->name) }}">
                                <x-home.product-card image="{{ $product->photo }}" title="{{ $product->name }}"
                                    product_id="{{ $product->id }}" price="{{ $product->harga }}"
                                    satuan="{{ $product->satuan }}">
                                    <span
                                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm bg-green-100 text-green-800">{{ $product->type }}</span>
                                </x-home.product-card>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Tab: Buah -->
            <div class="min-w-full snap-start p-4">
                <h2 class="text-xl font-bold mb-2">Buah</h2>
                {{-- tampilkan produk Buah --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                    @foreach ($products as $product)
                        @if ($product->type === 'buah')
                            <div class="product-card" data-name="{{ Str::lower($product->name) }}">
                                <x-home.product-card image="{{ $product->photo }}" title="{{ $product->name }}"
                                    product_id="{{ $product->id }}" price="{{ $product->harga }}"
                                    satuan="{{ $product->satuan }}">
                                    <span
                                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm bg-yellow-100 text-yellow-800">{{ $product->type }}</span>
                                </x-home.product-card>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
			
			<!-- Tab: Daging -->
            <div class="min-w-full snap-start p-4">
                <h2 class="text-xl font-bold mb-2">Daging</h2>
                {{-- tampilkan produk Daging --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                    @foreach ($products as $product)
                        @if ($product->type === 'daging')
                            <div class="product-card" data-name="{{ Str::lower($product->name) }}">
                                <x-home.product-card image="{{ $product->photo }}" title="{{ $product->name }}"
                                    product_id="{{ $product->id }}" price="{{ $product->harga }}"
                                    satuan="{{ $product->satuan }}">
                                    <span
                                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm bg-yellow-100 text-yellow-800">{{ $product->type }}</span>
                                </x-home.product-card>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
			
			<!-- Tab: Ikan -->
            <div class="min-w-full snap-start p-4">
                <h2 class="text-xl font-bold mb-2">Ikan</h2>
                {{-- tampilkan produk Ikan --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                    @foreach ($products as $product)
                        @if ($product->type === 'ikan')
                            <div class="product-card" data-name="{{ Str::lower($product->name) }}">
                                <x-home.product-card image="{{ $product->photo }}" title="{{ $product->name }}"
                                    product_id="{{ $product->id }}" price="{{ $product->harga }}"
                                    satuan="{{ $product->satuan }}">
                                    <span
                                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm bg-yellow-100 text-yellow-800">{{ $product->type }}</span>
                                </x-home.product-card>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
			
			<!-- Tab: Bumbu Dapur -->
            <div class="min-w-full snap-start p-4">
                <h2 class="text-xl font-bold mb-2">Bumbu Dapur</h2>
                {{-- tampilkan produk Bumbu Dapur --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                    @foreach ($products as $product)
                        @if ($product->type === 'bumbu dapur')
                            <div class="product-card" data-name="{{ Str::lower($product->name) }}">
                                <x-home.product-card image="{{ $product->photo }}" title="{{ $product->name }}"
                                    product_id="{{ $product->id }}" price="{{ $product->harga }}"
                                    satuan="{{ $product->satuan }}">
                                    <span
                                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm bg-yellow-100 text-yellow-800">{{ $product->type }}</span>
                                </x-home.product-card>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Tab: Lainnya -->
            <div class="min-w-full snap-start p-4">
                <h2 class="text-xl font-bold mb-2">Lainnya</h2>
                {{-- tampilkan produk Lainnya --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
                    @foreach ($products as $product)
                        @if ($product->type === 'lainnya')
                            <div class="product-card" data-name="{{ Str::lower($product->name) }}">
                                <x-home.product-card image="{{ $product->photo }}" title="{{ $product->name }}"
                                    product_id="{{ $product->id }}" price="{{ $product->harga }}"
                                    satuan="{{ $product->satuan }}">
                                    <span
                                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm bg-blue-100 text-blue-800">{{ $product->type }}</span>
                                </x-home.product-card>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</x-home.layout>
