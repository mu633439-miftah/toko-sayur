@props([
    'value' => '',
    'name' => 'photo',
])

@php
    $uid = uniqid();
@endphp

<div class="image-upload-component">
    <label class="block mb-2 text-sm font-medium text-gray-900">Foto Produk</label>
    <div class="relative w-fit">
        <img src="{{ $value !== '' ? $value : asset('images/image-default.png') }}" alt="image-default"
            class="object-cover w-32 h-32 rounded-xl image-preview">
        <label class="absolute p-1 text-gray-800 rounded-xl cursor-pointer -bottom-1 -right-1 bg-grayTheme">
            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                    d="M4 18V8a1 1 0 0 1 1-1h1.5l1.707-1.707A1 1 0 0 1 8.914 5h6.172a1 1 0 0 1 .707.293L17.5 7H19a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Z" />
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            <input type="file" class="hidden image-input" accept="image/*">
        </label>
    </div>
    <input type="hidden" name="{{ $name }}" value="{{ $value }}" class="image-url">
</div>
