<x-home.layout title_header="Toko Sayur">
    <div class="md:mt-20 mt-32">
        <x-home.jumbotron />

        {{-- tentang --}}
        <x-home.about />

        {{-- produk --}}
        <x-home.highlight-product :products="$products" />

        {{-- footer --}}
        <section id="footer" class="p-4 text-white bg-primary">
            <x-home.layout.footer />
        </section>
    </div>
</x-home.layout>
