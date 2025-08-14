<x-auth.layout title_header="Sign In">
    <div class="flex items-center min-h-screen">
        {{-- card 1 --}}
        <div class="flex flex-col items-center justify-center w-full md:w-1/2 px-6 pt-8 mx-auto md:h-screen pt:mt-0">
            <div class="flex items-center justify-center mb-8 text-2xl font-semibold">
                <img src="{{ asset('images/logo.png') }}" class="h-16 mr-4" alt="Toko Sayur Logo">
                <span class="self-center text-2xl font-bold whitespace-nowrap">Toko Sayur</span>
            </div>
            <!-- Card -->
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-screen-3xl xl:p-0">
                <div class="p-6 space-y-8 sm:p-8">
                    {{-- header form --}}
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 lg:text-3xl">
                            Daftar Akun <span class="text-primary">Toko Sayur</span>
                        </h2>
                        <span>Silahkan isi data dibawah untuk mendaftar.</span>
                    </div>

                    {{-- form --}}
                    <form class="mt-8 space-y-6 overflow-y-auto h-96" action="{{ route('register') }}" method="POST">
                        @csrf
                        {{-- username --}}
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="jhon_doe" required>
                        </div>

                        {{-- nama --}}
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Lengkap</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="Jhon Doe" required>
                        </div>

                        {{-- email --}}
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="email@example.com" required>
                        </div>

                        {{-- no wa --}}
                        <div>
                            <label for="no_wa" class="block mb-2 text-sm font-medium text-gray-900">Nomor
                                Whatsapp</label>
                            <input type="text" name="no_wa" id="no_wa" value="{{ old('no_wa') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                placeholder="08xxxxxxxx" required minlength="10">
                        </div>

                        {{-- password --}}
                        <div class="relative">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" value="{{ old('password') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 pr-10"
                                placeholder="••••••••" required>

                            <!-- Eye icon button -->
                            <button type="button" id="togglePassword"
                                class="absolute text-gray-500 right-2 top-9 hover:text-gray-700">
                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>

                        {{-- password confirm --}}
                        <div class="relative">
                            <label for="password_confirm"
                                class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password_confirm" id="passwordConfirm"
                                value="{{ old('password_confirm') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 pr-10"
                                placeholder="••••••••" required>

                            <!-- Eye icon button -->
                            <button type="button" id="togglePasswordConfirm"
                                class="absolute text-gray-500 right-2 top-9 hover:text-gray-700">
                                <svg id="eyeIconConfirm" class="w-5 h-5" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>

                        <button type="submit"
                            class="w-full px-5 py-3 text-base font-medium text-center text-white rounded-lg cursor-pointer bg-primary hover:bg-emerald-500 focus:ring-4 focus:ring-lightPrimary sm:w-auto">Daftar</button>
                        <div class="text-sm font-medium text-gray-500">
                            Sudah punya akun? <a href={{ route('login') }} class="text-primary hover:underline">Masuk
                                disini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- card 2 --}}
        <div class="hidden border-black/12.5 shadow-xl relative z-20 md:flex min-w-0 flex-col break-words border-0 border-solid bg-gray-700 bg-center bg-no-repeat bg-cover bg-blend-multiply bg-clip-border h-screen w-1/2 justify-center px-10 text-right"
            style="background-image: url('/images/auth-image.jpg')">
            <span class="mt-5 text-xl font-medium text-white">Halo Pengguna Baru👋,</span>
            <h1 class="text-6xl font-bold tracking-wider text-white">Selamat Datang di <span
                    class="text-lightPrimary">Toko Sayur</span></h1>
        </div>
    </div>
</x-auth.layout>
