<x-layouts.app>
    <div class="max-w-6xl mx-auto py-10">

        <h1 class="text-2xl font-bold text-orange-600 mb-6">
            Data Peminjaman
        </h1>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Inventory</th>
                    <th class="border p-2">Tanggal</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peminjamans as $p)
                    <tr>
                        <td class="border p-2">{{ $p->user->name }}</td>
                        <td class="border p-2">{{ $p->inventory }}</td>
                        <td class="border p-2">
                            {{ $p->tanggal_mulai }} <br>
                            s/d {{ $p->tanggal_selesai }}
                        </td>
                        <td class="border p-2 font-semibold">
                            {{ ucfirst($p->status) }}
                        </td>
                        <td class="border p-2 flex gap-2">
                            @if ($p->status === 'menunggu')
                                <form method="POST"
                                      action="{{ route('admin.peminjaman.approve', $p->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="px-3 py-1 bg-green-600 text-white rounded">
                                        Approve
                                    </button>
                                </form>

                                <form method="POST"
                                      action="{{ route('admin.peminjaman.reject', $p->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded">
                                        Reject
                                    </button>
                                </form>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-500">
                            Belum ada data peminjaman
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-layouts.app>