<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-6xl w-full px-10">

            {{-- FORM LOGIN --}}
            <div class="flex flex-col justify-center">
                <h1 class="text-3xl font-bold mb-2 text-center md:text-left text-gray-800">
                    Login Akun
                </h1>

                <p class="text-sm text-gray-600 mb-8 text-center md:text-left">
                    Login untuk mengakses sistem
                    <span class="font-medium">
                        Peminjaman Ruangan & Inventaris ITENAS
                    </span>
                </p>

                {{-- SESSION MESSAGE --}}
                @if (session('success'))
                    <div class="w-full p-3 mb-3 font-medium text-white bg-orange-600 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="w-full p-3 mb-3 font-medium text-white bg-red-600 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                    @csrf

                    {{-- EMAIL --}}
                    <div>
                        <label for="email" class="text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            class="w-full p-2 mt-1 border border-orange-500 rounded focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="email@mhs.itenas.ac.id"
                            required>
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <label for="password" class="text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="w-full p-2 mt-1 border border-orange-500 rounded focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="••••••••"
                            required>
                    </div>

                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="w-full py-2 mt-2 bg-orange-600 text-white rounded hover:bg-orange-700 transition font-semibold">
                        Login
                    </button>

                    {{-- REGISTER --}}
                    <p class="text-sm text-center mt-4 text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                           class="text-orange-600 font-semibold hover:underline">
                            Register di sini
                        </a>
                    </p>
                </form>
            </div>

            {{-- GAMBAR --}}
            <div class="hidden md:flex items-center justify-center">
                <img
                    src="{{ asset('assets/images/registerPage/gsg.jpg') }}"
                    alt="Gedung ITENAS"
                    class="max-w-md w-full h-auto rounded-xl shadow-lg object-cover">
            </div>

        </div>
    </div>
</x-layouts.app>
