<nav class="fixed top-0 z-20 w-full bg-white border-b border-gray-200 shadow-xl">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Toko Sayur Logo">
            <span class="self-center text-2xl font-semibold tracking-tight whitespace-nowrap text-primary">Toko
                Sayur</span>
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            <div>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                    class="flex items-center justify-between w-full gap-0 px-3 py-2 text-gray-900 rounded-sm cursor-pointer hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0 md:w-auto">
                    <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                            clip-rule="evenodd" />
                    </svg>

                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownNavbar"
                    class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="{{ route('cart') }}"
                                class="flex items-center gap-1 text-primary hover:text-white border border-primary hover:bg-primary focus:ring-4 focus:outline-none focus:ring-lightPrimary font-medium rounded-lg text-sm px-5 py-1.5 my-2 mx-3 w-[90%]">

                                <!-- Badge jumlah produk -->
                                <span id="cart-count"
                                    class="bg-red-600 text-white text-xs font-bold w-5 h-5 items-center justify-center rounded-full hidden">
                                    0
                                </span>

                                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                                </svg>

                                Keranjang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('transactions') }}"
                                class="flex items-center gap-1 text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-5 py-1.5 my-2 mx-3 w-[90%]">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>


                                Transaksi & Histori
                            </a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <form id="formLogout" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="button" onclick="confirmLogout()"
                                class="block text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center my-2 mx-3 w-[90%]">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul id="navMenu"
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="/home#home"
                        class="nav-link block px-3 py-2 rounded-sm md:p-0 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary">
                        Home</a>
                </li>
                <li>
                    <a href="/home#about"
                        class="nav-link block px-3 py-2 rounded-sm md:p-0 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary">
                        Tentang</a>
                </li>
                <li>
                    <a href="/home#product"
                        class="nav-link block px-3 py-2 rounded-sm md:p-0 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary">
                        Produk</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<script>
    function confirmLogout() {
        Swal.fire({
            title: "Apakah kamu yakin ingin Logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Logout",
            cancelButtonText: "Batal",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika user klik "Hapus", kirim form-nya
                document.getElementById("formLogout").submit();
            }
        });
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const badge = document.getElementById("cart-count");

        try {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];

            // Hitung total item (bisa jumlah produk, atau total qty)
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0); // atau: cart.length

            if (totalItems > 0) {
                badge.textContent = totalItems;
                badge.classList.remove("hidden");
                badge.classList.add("flex")
            } else {
                badge.classList.add("hidden");
                badge.classList.remove("flex")
            }
        } catch (e) {
            console.warn("Gagal membaca cart dari localStorage:", e);
        }
    });
</script>
