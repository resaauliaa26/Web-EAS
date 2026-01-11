<x-layouts.app>
    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- HEADER --}}
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-orange-600">
                Dashboard Mahasiswa
            </h1>
            <p class="text-gray-600 mt-1">
                Selamat datang kembali,
                <span class="font-semibold">{{ auth()->user()->name }}</span>
            </p>
        </div>

        {{-- NOTIFIKASI --}}
        @if (session('success'))
            <div class="mb-6 p-4 rounded bg-green-100 text-green-700 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- STATISTIK --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">

            <div class="bg-white border rounded-xl p-6 shadow-sm">
                <p class="text-sm text-gray-500">Total Peminjaman</p>
                <p class="text-3xl font-bold text-orange-600 mt-2">
                    {{ $totalPeminjaman ?? 0 }}
                </p>
            </div>

            <div class="bg-white border rounded-xl p-6 shadow-sm">
                <p class="text-sm text-gray-500">Disetujui</p>
                <p class="text-3xl font-bold text-green-600 mt-2">
                    {{ $disetujui ?? 0 }}
                </p>
            </div>

            <div class="bg-white border rounded-xl p-6 shadow-sm">
                <p class="text-sm text-gray-500">Menunggu</p>
                <p class="text-3xl font-bold text-yellow-500 mt-2">
                    {{ $menunggu ?? 0 }}
                </p>
            </div>

            <div class="bg-white border rounded-xl p-6 shadow-sm">
                <p class="text-sm text-gray-500">Ditolak</p>
                <p class="text-3xl font-bold text-red-600 mt-2">
                    {{ $ditolak ?? 0 }}
                </p>
            </div>

        </div>

        {{-- USER INFO --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <p class="text-sm text-gray-500">Nama</p>
                <p class="font-semibold text-lg">{{ auth()->user()->name }}</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border p-6">
                <p class="text-sm text-gray-500">Email</p>
                <p class="font-semibold text-lg">{{ auth()->user()->email }}</p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border p-6">
                <p class="text-sm text-gray-500">Role</p>
                <p class="font-semibold text-lg capitalize">
                    {{ auth()->user()->role ?? 'mahasiswa' }}
                </p>
            </div>
        </div>

        {{-- MENU UTAMA --}}
        <div>
            <h2 class="text-xl font-semibold mb-6 text-gray-800">
                Menu Utama
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- AJUKAN PEMINJAMAN --}}
                <a href="{{ route('peminjaman.create') }}" class="block">
                    <div class="bg-orange-600 text-white rounded-xl p-6 shadow hover:bg-orange-700 transition">
                        <h3 class="text-lg font-semibold mb-2">
                            Ajukan Peminjaman
                        </h3>
                        <p class="text-sm opacity-90">
                            Ruangan & Inventaris ITENAS
                        </p>
                    </div>
                </a>

                {{-- RIWAYAT --}}
                <a href="{{ route('peminjaman.riwayat') }}" class="block">
                    <div class="bg-white border rounded-xl p-6 shadow-sm hover:shadow transition">
                        <h3 class="text-lg font-semibold mb-2 text-gray-800">
                            Riwayat Peminjaman
                        </h3>
                        <p class="text-sm text-gray-600">
                            Status & histori peminjaman
                        </p>
                    </div>
                </a>

                {{-- PROFIL --}}
                <div class="block opacity-70 cursor-not-allowed">
                    <div class="bg-white border rounded-xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold mb-2 text-gray-800">
                            Profil Saya
                        </h3>
                        <p class="text-sm text-gray-600">
                            Fitur segera tersedia
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-layouts.app>
