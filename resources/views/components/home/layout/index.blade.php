@props(['title_header'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<x-home.layout.header>
    {{ $title_header }}
</x-home.layout.header>

<body>
    {{-- Pemberitahuan --}}
    @if (request()->get('status') == 'pending')
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Status Pending',
                text: 'Mohon selesaikan pembayaran sebelum batas waktu yang diberikan.',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hapus parameter 'status' di URL tanpa reload
                    const url = new URL(window.location);
                    url.searchParams.delete('status');
                    window.history.replaceState({}, document.title, url.toString());
                }
            });
        </script>
    @elseif (request()->get('status') == 'success')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Pembayaran Berhasil',
                text: 'Selamat, pembayaran kamu berhasil.',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hapus parameter 'status' di URL tanpa reload
                    const url = new URL(window.location);
                    url.searchParams.delete('status');
                    window.history.replaceState({}, document.title, url.toString());
                }
            });
        </script>
    @elseif (request()->get('status') == 'error')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Terjadi kesalahan saat melakukan pembayaran. Silahkan coba lagi.',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hapus parameter 'status' di URL tanpa reload
                    const url = new URL(window.location);
                    url.searchParams.delete('status');
                    window.history.replaceState({}, document.title, url.toString());
                }
            });
        </script>
    @elseif (request()->get('status') == 'failed')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Pembayaran Gagal',
                text: 'Pembayaran gagal dilakukan. Silahkan coba lagi.',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hapus parameter 'status' di URL tanpa reload
                    const url = new URL(window.location);
                    url.searchParams.delete('status');
                    window.history.replaceState({}, document.title, url.toString());
                }
            });
        </script>
    @endif


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

    @if (session()->has('checkout'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Hapus data checkout dari localStorage (misalnya key-nya 'cart' atau yang kamu pakai)
                localStorage.removeItem('cart');

                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: @json(session('checkout')),
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
    <x-home.layout.navbar />

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
