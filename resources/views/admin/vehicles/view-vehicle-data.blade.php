<x-layouts.app>
    <div class="mx-44">

        <div class="flex items-center justify-between mt-5 mb-5">
            <h1 class="text-2xl font-bold text-orange-600">
                Data Ruangan & Inventaris ITENAS
            </h1>

            <a href="{{ route('vehicles.create') }}"
                class="text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Tambah Data
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right">

                <thead class="text-xs text-white uppercase bg-orange-500">
                    <tr>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Sumber Daya</th>
                        <th class="px-6 py-3">Kode</th>
                        <th class="px-6 py-3">Lokasi</th>
                        <th class="px-6 py-3">Jenis</th>
                        <th class="px-6 py-3">Kapasitas</th>
                        <th class="px-6 py-3">Biaya</th>
                        <th class="px-6 py-3">Tahun</th>
                        <th class="px-6 py-3">Spesifikasi</th>
                        <th class="px-6 py-3">Akses</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Unit</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Foto</th>
                        <th class="px-6 py-3 text-center">Opsi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr class="border-b odd:bg-white even:bg-orange-50">

                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $vehicle->vehicle_name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->petrol }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->plate }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_color }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_type }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_seat }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_price }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_year }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_engine }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_doors }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_transmision }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $vehicle->vehicle_merk }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold rounded-lg
                                    @if($vehicle->vehicle_status === 'tersedia') bg-green-100 text-green-700
                                    @elseif($vehicle->vehicle_status === 'dipinjam') bg-yellow-100 text-yellow-700
                                    @elseif($vehicle->vehicle_status === 'maintenance') bg-red-100 text-red-700
                                    @else bg-gray-100 text-gray-700
                                    @endif">
                                    {{ $vehicle->vehicle_status }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $vehicle->vehicle_image) }}"
                                    class="w-20 rounded-lg border border-orange-300"
                                    alt="{{ $vehicle->vehicle_name }}">
                            </td>

                            <td class="px-6 py-4 flex gap-3 justify-center">

                                <a href="{{ route('vehicles.show', $vehicle->id) }}"
                                    class="text-sm text-blue-600 hover:underline">
                                    Detail
                                </a>

                                <a href="{{ route('vehicles.edit', $vehicle->id) }}"
                                    class="text-sm text-orange-600 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: "bottom-end",
                title: 'Berhasil',
                text: "{{ session('success') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif
</x-layouts.app>