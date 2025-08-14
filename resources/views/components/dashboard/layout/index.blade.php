@props(['title_header'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-dashboard.layout.header>
    {{ $title_header }}
</x-dashboard.layout.header>

<body>
    {{-- Alert --}}
    @if (session()->has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: @json(session('success')),
                });
            });
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: @json(session('error')),
                });
            });
        </script>
    @endif


    {{-- navbar --}}
    <x-dashboard.layout.navbar />

    <div class="flex pt-16 overflow-hidden bg-white">

        {{-- sidebar --}}
        <x-dashboard.layout.sidebar />

        <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-64">
            {{-- main --}}
            <main class="min-h-[calc(100vh-10rem)]">
                {{ $slot }}
            </main>

            {{-- footer --}}
            <x-dashboard.layout.footer />
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
