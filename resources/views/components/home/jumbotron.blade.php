<header id="home" class="flex relative items-center justify-center h-[70vh]">
    <div class="w-[90%] h-full rounded-xl overflow-hidden bg-cover bg-no-repeat bg-[url({{ asset('images/jumbotron.jpg') }})] bg-gray-700 bg-blend-multiply"
        style="background-image: url('/images/jumbotron.jpg')">
        <div class="max-w-screen-xl px-4 py-24 mx-auto text-center lg:py-40">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl">
                Selamat Datang di <span class="text-lightPrimary">Toko Sayur</span></h1>
            <p class="max-w-4xl mx-auto mb-8 text-sm font-normal text-gray-300 lg:text-base sm:px-16 lg:px-48">
                Silahkan lihat
                katalog
                produk terbaru kami dan belanja semua kebutuhan anda disini.</p>
        </div>
    </div>

    <div class="absolute -bottom-55 flex items-center justify-between mx-auto  h-full w-[80%]">
        {{-- sayur --}}
        <div class="w-[30%] h-40 border shadow-xl rounded-xl border-slate-300 overflow-hidden cursor-pointer">
            <img src="{{ asset('images/sayur.jpg') }}" alt="sayur"
                class="object-cover w-full h-full transition-all rounded-xl hover:scale-110 hover:brightness-100 brightness-75">
        </div>

        {{-- buah --}}
        <div class="w-[30%] h-40 border shadow-xl rounded-xl border-slate-300 overflow-hidden cursor-pointer">
            <img src="{{ asset('images/buah.jpg') }}" alt="buah"
                class="object-cover w-full h-full transition-all rounded-xl hover:scale-110 hover:brightness-100 brightness-75">
        </div>
		
		{{-- daging --}}
        <div class="w-[30%] h-40 border shadow-xl rounded-xl border-slate-300 overflow-hidden cursor-pointer">
            <img src="{{ asset('images/buah.jpg') }}" alt="daging"
                class="object-cover w-full h-full transition-all rounded-xl hover:scale-110 hover:brightness-100 brightness-75">
        </div>
		
		{{-- ikan --}}
        <div class="w-[30%] h-40 border shadow-xl rounded-xl border-slate-300 overflow-hidden cursor-pointer">
            <img src="{{ asset('images/buah.jpg') }}" alt="ikan"
                class="object-cover w-full h-full transition-all rounded-xl hover:scale-110 hover:brightness-100 brightness-75">
        </div>
		
		{{-- bumbu dapur --}}
        <div class="w-[30%] h-40 border shadow-xl rounded-xl border-slate-300 overflow-hidden cursor-pointer">
            <img src="{{ asset('images/buah.jpg') }}" alt="bumbu dapur"
                class="object-cover w-full h-full transition-all rounded-xl hover:scale-110 hover:brightness-100 brightness-75">
        </div>

        {{-- lainnya --}}
        <div class="w-[30%] h-40 border shadow-xl rounded-xl border-slate-300 overflow-hidden cursor-pointer">
            <img src="{{ asset('images/lainnya.jpg') }}" alt=""
                class="object-cover w-full h-full transition-all rounded-xl hover:scale-110 hover:brightness-100 brightness-75">
        </div>
    </div>
</header>
