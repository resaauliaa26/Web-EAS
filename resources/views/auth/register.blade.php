<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-6xl w-full px-10">

            {{-- FORM REGISTER --}}
            <div class="flex flex-col justify-center">
                <h1 class="text-3xl font-bold mb-2">
                    Registrasi Akun Mahasiswa
                </h1>

                <p class="text-sm text-gray-600 mb-8">
                    Silakan daftar untuk mengakses sistem Peminjaman Ruangan & Inventaris ITENAS
                </p>

                <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="name" class="text-sm font-medium">Nama Lengkap</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="w-full p-2 border border-orange-500 rounded focus:ring-2 focus:ring-orange-400"
                            placeholder="Nama Lengkap..">
                    </div>

                    <div>
                        <label for="email" class="text-sm font-medium">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="w-full p-2 border border-orange-500 rounded focus:ring-2 focus:ring-orange-400"
                            placeholder="Email ITENAS..">
                    </div>

                    <div>
                        <label for="password" class="text-sm font-medium">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="w-full p-2 border border-orange-500 rounded focus:ring-2 focus:ring-orange-400"
                            placeholder="Password..">
                    </div>

                    <button
                        type="submit"
                        class="w-full py-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition">
                        Register
                    </button>

                    <p class="text-sm text-center">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-orange-600 font-semibold hover:underline">
                            Login
                        </a>
                    </p>
                </form>
            </div>

            {{-- GAMBAR --}}
            <div class="flex items-center justify-center">
                <img
                    src="{{ asset('assets/images/registerPage/gsg.jpg') }}"
                    alt="Gedung ITENAS"
                    class="max-w-md w-full h-auto rounded-xl shadow-lg object-cover">
            </div>

        </div>
    </div>
</x-layouts.app>
