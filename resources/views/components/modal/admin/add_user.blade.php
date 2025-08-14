<x-modal.template id_modal="add-user" title="Tambah User">
    <!-- Modal body -->
    <form class="p-4 md:p-5" action="{{ route('admin.user.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-2 gap-4 mb-4">
            {{-- name --}}
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="Jhon Doe" required="">

                @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- username --}}
            <div class="col-span-2">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="jhon_doe" required="">

                @error('username')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- email --}}
            <div class="col-span-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="email@example.com" required="">

                @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>


            {{-- no wa --}}
            <div class="col-span-2">
                <label for="no_wa" class="block mb-2 text-sm font-medium text-gray-900 ">Nomor Whatsapp</label>
                <input type="text" name="no_wa" id="no_wa" value="{{ old('no_wa') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="08xxxxxxxx" required="" minlength="10" maxlength="13">

                @error('no_wa')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- password --}}
            <div class="relative">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 pr-10"
                    required minlength="8">

                <!-- Eye icon button -->
                <button type="button" id="togglePassword"
                    class="absolute text-gray-500 right-2 top-9 hover:text-gray-700">
                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>

                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- password confirm --}}
            <div class="relative">
                <label for="password_confirm" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi
                    Password</label>
                <input type="password" name="password_confirm" id="passwordConfirm"
                    value="{{ old('password_confirm') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 pr-10"
                    required minlength="8">

                <!-- Eye icon button -->
                <button type="button" id="togglePasswordConfirm"
                    class="absolute text-gray-500 right-2 top-9 hover:text-gray-700">
                    <svg id="eyeIconConfirm" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>

                @error('password_confirm')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

        <button type="submit"
            class="text-white inline-flex items-center bg-primary hover:bg-emerald-600 cursor-pointer focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Simpan
        </button>
    </form>
</x-modal.template>
