@props(['id_user', 'user'])

<x-modal.template id_modal="edit-user-{{ $id_user }}" title="Edit User">
    <!-- Modal body -->
    <form class="p-4 md:p-5" action="{{ route('admin.user.update', $id_user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4 mb-4">
            {{-- role hidden --}}
            <input type="hidden" name="role" value="{{ $user->role }}">

            {{-- name --}}
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="Jhon Doe" required="">
            </div>

            {{-- username --}}
            <div class="col-span-2">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="jhon_doe" required="">
            </div>

            {{-- email --}}
            <div class="col-span-2">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="email@example.com" required="">
            </div>

            {{-- no wa --}}
            <div class="col-span-2">
                <label for="no_wa" class="block mb-2 text-sm font-medium text-gray-900 ">Nomor Whatsapp</label>
                <input type="text" name="no_wa" id="no_wa" value="{{ old('no_wa', $user->no_wa) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                    placeholder="08xxxxxxxx" required="" minlength="10">
            </div>

            {{-- password --}}
            <div class="relative col-span-2">
                <label for="password" class="block text-sm font-medium text-gray-900">Password Baru</label>
                <span class="mb-2 text-xs font-light tracking-wide text-red-500">*Hanya diisi saat ingin mengganti
                    password</span>

                <input type="password" name="password" id="password" value="{{ old('password') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 pr-10"
                    placeholder="••••••••">
            </div>

        </div>

        <button type="submit"
            class="text-white inline-flex items-center bg-primary hover:bg-emerald-600 cursor-pointer focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
            <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Simpan
        </button>
    </form>
</x-modal.template>
