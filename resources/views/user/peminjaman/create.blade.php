<x-layouts.app>
    <div class="max-w-2xl mx-auto mt-16">
        <h1 class="mb-6 text-2xl font-bold text-orange-600">
            Ajukan Peminjaman
        </h1>

        <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- INPUT RUANGAN / INVENTARIS --}}
            <div>
                <label class="block mb-1 font-medium">
                    Nama Ruangan / Inventaris
                </label>

                <input
                    type="text"
                    name="inventory"
                    placeholder="Contoh: Gedung Serbaguna / Proyektor Logistik / dll"
                    class="w-full p-2 border border-orange-400 rounded focus:ring-2 focus:ring-orange-300"
                    required>
            </div>

            {{-- TANGGAL MULAI --}}
            <div>
                <label class="block mb-1 font-medium">Tanggal Mulai</label>
                <input
                    type="date"
                    name="tanggal_mulai"
                    class="w-full p-2 border border-orange-400 rounded focus:ring-2 focus:ring-orange-300"
                    required>
            </div>

            {{-- TANGGAL SELESAI --}}
            <div>
                <label class="block mb-1 font-medium">Tanggal Selesai</label>
                <input
                    type="date"
                    name="tanggal_selesai"
                    class="w-full p-2 border border-orange-400 rounded focus:ring-2 focus:ring-orange-300"
                    required>
            </div>

            {{-- SUBMIT --}}
            <button
                type="submit"
                class="w-full p-2 text-white bg-orange-600 rounded hover:bg-orange-700 transition">
                Ajukan Peminjaman
            </button>
        </form>
    </div>
</x-layouts.app>
