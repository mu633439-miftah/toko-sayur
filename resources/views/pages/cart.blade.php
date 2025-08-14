<x-home.layout title_header="Keranjang">
    <div class="pt-20 pb-3 bg-center bg-no-repeat bg-[url('/images/auth-image.jpg')] bg-cover bg-gray-700 bg-blend-multiply h-screen"
        style="background-image: url('/images/auth-image.jpg')">
        <form action="{{ route('checkout') }}" method="POST"
            class="mx-auto max-w-3xl bg-white rounded-xl shadow border border-gray-200 p-10 h-full flex flex-col overflow-auto justify-between">
            @csrf

            <div>
                <div class="flex items-center gap-1 text-primary">
                    <x-home.back-pages href="{{ route('products') }}" />

                    <svg class="w-8 h-8 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                    <h1 class="text-2xl font-bold tracking-wide uppercase ">Keranjang</h1>
                </div>

                <div class="mt-8 h-full overflow-auto">
                    <div id="cart-items"></div>
                </div>
            </div>

            <div class="mt-5 mb-2">
                <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900">Catatan Untuk Penjual</label>
                <textarea id="catatan" name="catatan" rows="2"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Tulis catatanmu disini..."></textarea>

            </div>
            <div class="mb-5">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                <textarea id="alamat" name="alamat" rows="2"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Tulis alamatmu disini..."></textarea>
            </div>

            <div class="flex justify-between w-full items-center mt-10">
                <p class="mt-5">Total Harga : <span class="text-base md:text-xl font-bold">Rp. <span
                            id="totalHarga">0</span></span></p>
                <!-- hidden value input -->
                <input type="hidden" name="total" id="inputTotal">
                <div id="productsContainer"></div>

                <button type="submit" id="checkout-button"
                    class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">Checkout</button>
            </div>
        </form>
    </div>
</x-home.layout>

<script>
    const allProducts = @json($products);
    const cartItems = JSON.parse(localStorage.getItem("cart") || "[]");
    const cartMap = Object.fromEntries(cartItems.map(item => [item.id, item.quantity]));
    const totalHarga = document.getElementById("totalHarga");
    const container = document.getElementById("cart-items");

    let jumlah = 0;
    let index = 0;
    let hasItem = false;

    // Kosongkan container dulu (optional)
    container.innerHTML = "";
    productsContainer.innerHTML = "";

    allProducts.forEach(product => {
        const qty = cartMap[product.id];
        if (!qty) return;

        const total = qty * product.harga;
        jumlah += total;
        hasItem = true;

        const itemHTML = `
            <div class="cart-item flex items-center gap-5 my-3" data-id="${product.id}">
                <img src="${product.photo}" alt="image product"
                    class="w-20 h-20 object-cover rounded-xl">
                <div class="w-full">
                    <h6 class="text-lg font-semibold">${product.name}</h6>
                    <div class="flex items-center gap-2 justify-between">
                        <p class="text-primary">Rp. ${product.harga.toLocaleString()} x ${qty}</p>
                        <p class="text-sm font-light">Jumlah Harga : 
                            <span class="text-xl font-bold">Rp. ${total.toLocaleString()}</span>
                        </p>
                    </div>

                    <button type="button" data-id="${product.id}" class="remove-product text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center mt-3">Hapus</button>
                </div>
            </div>
            <hr class="border-gray-200 my-3" />
        `;

        container.innerHTML += itemHTML;

        // Tambahkan input hidden untuk setiap produk
        productsContainer.innerHTML += `
            <input type="hidden" name="products[${index}][product_id]" value="${Number(product.id)}">
            <input type="hidden" name="products[${index}][jumlah]" value="${Number(qty)}">
            <input type="hidden" name="products[${index}][harga]" value="${Number(product.harga)}">
        `;

        index++;
    });


    // Tampilkan pesan jika keranjang kosong
    if (!hasItem) {
        container.innerHTML = `
        <div class="text-center text-gray-500 py-10">
            <p class="text-lg font-semibold">Keranjang kosong</p>
            <p>Yuk, belanja dulu!</p>
        </div>
    `;

        document.getElementById("checkout-button").disabled = true;
    }

    // Pasang event listener SETELAH item masuk DOM
    container.addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-product")) {
            const id = e.target.dataset.id;

            const newCart = cartItems.filter(item => String(item.id) !== String(id));
            localStorage.setItem("cart", JSON.stringify(newCart));
            location.reload(); // reload biar re-render cart
        }
    });

    // Tampilkan total harga
    inputTotal.value = Number(jumlah);
    if (totalHarga) {
        totalHarga.textContent = jumlah.toLocaleString("id-ID");
    }
</script>
