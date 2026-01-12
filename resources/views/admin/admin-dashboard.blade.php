<x-layouts.app>
    <div class="mx-44">

        <h1 class="text-2xl font-bold text-orange-600">
            Dashboard Admin
        </h1>

        <p class="text-sm text-gray-600">
            Sistem Peminjaman Ruangan & Inventaris ITENAS
        </p>

        <div class="grid grid-cols-4 gap-3 mt-5">

            <x-cards 
                :totals="$totalPeminjaman"
                description="Total Pengajuan Peminjaman"
            />

            <x-cards 
                :totals="$disetujui"
                description="Disetujui"
            />

            <x-cards 
                :totals="$menunggu"
                description="Menunggu Persetujuan"
            />

            <x-cards 
                :totals="$ditolak"
                description="Ditolak"
            />

        </div>
    </div>
</x-layouts.app>