@props(['image', 'title', 'price', 'satuan', 'product_id' => ''])


<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm ">
    <div class="block">
        <img class="w-full h-48 p-3 rounded-t-xl" src="{{ asset($image) }}" alt="product image" />
    </div>
    <div class="px-5 pb-5">
        <div>
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 ">{{ $title }} <span
                    class="text-sm text-gray-400"> per {{ $satuan ? $satuan : 'kg' }}</span></h5>
        </div>
        <div class="flex items-center mt-2.5 mb-5">
            <p class="text-sm text-gray-700">{{ $slot }}</p>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-xl font-bold text-gray-900 ">Rp {{ number_format($price, 0, ',', '.') }}</span>


            <div class="cart-control max-w-1/2" data-id="{{ $product_id }}">
                <button type="button" data-id="{{ $product_id }}"
                    class="add-to-cart block text-white bg-primary hover:bg-emerald-600 focus:ring-4 focus:outline-none focus:ring-lightPrimary font-medium rounded-lg text-xs px-3 py-1.5 text-center cursor-pointer">Tambah
                    ke keranjang</button>

                <div class="quantity-control hidden items-center gap-3">
                    <button
                        class="decrease text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg px-4 py-1.5 text-center cursor-pointer me-2">-</button>
                    <span class="quantity text-gray-800 font-semibold text-lg">1</span>
                    <button
                        class="increase text-primary hover:text-white border border-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-lightPrimary font-medium rounded-lg text-lg px-4 py-1.5 text-center cursor-pointer ms-2">+</button>
                </div>
            </div>
        </div>
    </div>
</div>
