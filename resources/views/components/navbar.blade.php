<nav class="sticky top-0 z-[10000] bg-white border-b py-4" data-aos="fade-down">
    <div class="flex items-center justify-between mx-44">

        {{-- LOGO (SELALU KE HOME) --}}
        <div class="logo">
            <a href="{{ route('home') }}">
                <h1 class="text-xl font-bold text-orange-600">
                    {{ config('app.name', 'ITENAS') }}
                </h1>
            </a>
        </div>

        {{-- MENU --}}
        <ul class="flex items-center gap-8 text-sm font-medium">

            @auth
                {{-- ================= USER ================= --}}
                @if(auth()->user()->role === 'user')

                    <li>
                        <a href="{{ route('dashboard.user') }}"
                           class="{{ request()->routeIs('dashboard.user') ? 'text-orange-600 underline' : 'hover:underline' }}">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('peminjaman.create') }}"
                           class="{{ request()->routeIs('peminjaman.create') ? 'text-orange-600 underline' : 'hover:underline' }}">
                            Ajukan Peminjaman
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('peminjaman.riwayat') }}"
                           class="{{ request()->routeIs('peminjaman.riwayat') ? 'text-orange-600 underline' : 'hover:underline' }}">
                            Riwayat
                        </a>
                    </li>

                {{-- ================= ADMIN ================= --}}
                @elseif(auth()->user()->role === 'admin')

                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                           class="{{ request()->routeIs('admin.dashboard') ? 'text-orange-600 underline' : 'hover:underline' }}">
                            Dashboard Admin
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.peminjaman.index') }}"
                           class="{{ request()->routeIs('admin.peminjaman.*') ? 'text-orange-600 underline' : 'hover:underline' }}">
                            Kelola Peminjaman
                        </a>
                    </li>

                @endif

            {{-- ================= GUEST ================= --}}
            @else
                <li>
                    <a href="{{ route('home') }}"
                       class="{{ request()->routeIs('home') ? 'text-orange-600 underline' : 'hover:underline' }}">
                        Beranda
                    </a>
                </li>
                <li><a href="#" class="hover:underline">Layanan</a></li>
                <li><a href="#" class="hover:underline">Inventaris</a></li>
                <li><a href="#" class="hover:underline">Tentang Sistem</a></li>
            @endauth

        </ul>

        {{-- AUTH BUTTON --}}
        <div class="flex gap-3">
            @auth
                {{-- LOGOUT POST --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-5 py-2 border border-orange-600 text-orange-600 rounded
                               hover:bg-orange-600 hover:text-white transition">
                        Logout
                    </button>
                </form>
            @else
                {{-- ⚠️ PAKAI go.login (ANTI KLIK 2x) --}}
                <a href="{{ route('go.login') }}"
                   class="px-5 py-2 border border-orange-600 text-orange-600 rounded
                          hover:bg-orange-600 hover:text-white transition">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2 bg-orange-600 text-white rounded
                          hover:bg-orange-700 transition">
                    Register
                </a>
            @endauth
        </div>

    </div>
</nav>