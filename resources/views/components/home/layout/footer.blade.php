<footer class="bg-white rounded-lg shadow-sm">
    <div class="w-full max-w-screen-xl p-4 mx-auto md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ route('home') }}" class="flex items-center mb-4 space-x-3 sm:mb-0 rtl:space-x-reverse">
                <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Toko Sayur Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-primary">Toko
                    Sayur</span>
            </a>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center">© {{ date('Y') }} Toko Sayur. All
            Rights
            Reserved.</span>
    </div>
</footer>
