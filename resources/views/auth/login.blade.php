<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 max-w-6xl w-full px-10">

            {{-- FORM LOGIN --}}
            <div class="flex flex-col justify-center">
                <h1 class="text-3xl font-bold mb-2 text-center md:text-left text-orange-600">
                    Login Akun
                </h1>

                <p class="text-sm text-gray-600 mb-8 text-center md:text-left">
                    Login untuk mengakses sistem Peminjaman Ruangan & Inventaris ITENAS
                </p>

                {{-- SESSION MESSAGE --}}
                @if (session('success'))
                    <div class="w-full p-3 mb-4 font-semibold text-white bg-green-600 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="w-full p-3 mb-4 font-semibold text-white bg-red-600 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- FORM --}}
                <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            required
                            class="w-full p-2 border border-orange-400 rounded focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="Email ITENAS">
                    </div>

                    <div>
                        <label for="password" class="text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            class="w-full p-2 border border-orange-400 rounded focus:ring-2 focus:ring-orange-400 focus:outline-none"
                            placeholder="Password">
                    </div>

                    <button
                        type="submit"
                        class="w-full py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold">
                        Sign In
                    </button>

                    <p class="text-sm text-center mt-4">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                           class="text-orange-600 font-semibold hover:underline">
                            Register di sini
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