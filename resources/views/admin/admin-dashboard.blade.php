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
                totals="{{ $vehicles }}"
                description="Total Ruangan & Inventaris">
            </x-cards>

            <x-cards>
                Jumlah Sedang Dipinjam
            </x-cards>

            <x-cards>
                Jumlah Dalam Maintenance
            </x-cards>

            <x-cards>
                Jumlah Tersedia
            </x-cards>

            <x-cards>
                Total Biaya Peminjaman
            </x-cards>

        </div>
    </div>
</x-layouts.app>