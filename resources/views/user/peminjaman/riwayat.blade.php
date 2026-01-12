<x-layouts.app>
    <div class="mx-44 mt-6">

        <h1 class="text-2xl font-bold text-orange-600">
            Riwayat Peminjaman
        </h1>

        <p class="text-sm text-gray-600 mb-6">
            Daftar pengajuan peminjaman yang pernah kamu ajukan
        </p>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="w-full text-sm border">
                <thead class="bg-orange-600 text-white">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Inventaris / Ruangan</th>
                        <th class="px-4 py-2">Tanggal Mulai</th>
                        <th class="px-4 py-2">Tanggal Selesai</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($peminjamans as $item)
                        <tr class="border-t text-center">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $item->inventory }}</td>
                            <td class="px-4 py-2">{{ $item->tanggal_mulai }}</td>
                            <td class="px-4 py-2">{{ $item->tanggal_selesai }}</td>
                            <td class="px-4 py-2 font-semibold
                                @if($item->status === 'disetujui') text-green-600
                                @elseif($item->status === 'ditolak') text-red-600
                                @else text-yellow-600
                                @endif
                            ">
                                {{ ucfirst($item->status) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Belum ada riwayat peminjaman
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-layouts.app>