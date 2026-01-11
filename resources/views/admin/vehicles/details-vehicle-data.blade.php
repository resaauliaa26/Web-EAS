<x-layouts.app>
    <div class="mx-44">
        <h1 class="text-2xl font-bold text-orange-600">
            Edit Data Ruangan & Inventaris
        </h1>
        <p class="text-sm text-gray-600">
            Detail data ruangan dan inventaris ITENAS
        </p>

        <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-2">

                <div>
                    <label for="vehicle_name">Nama Ruangan / Inventaris</label><br>
                    <input type="text" name="vehicle_name" id="vehicle_name"
                        class="w-full p-2 border-2 border-orange-300 rounded-lg bg-gray-100"
                        value="{{ old('vehicle_name', $vehicle->vehicle_name) }}" disabled>
                </div>

                <div>
                    <label for="petrol">Sumber Daya</label><br>
                    <select name="petrol" id="petrol"
                        class="w-full p-2 border border-orange-300 rounded-lg bg-gray-100" disabled>
                        @foreach ($petrols as $petrol)
                            <option value="{{ $petrol }}" {{ old('petrol', $vehicle->petrol) == $petrol ? 'selected' : '' }}>
                                {{ $petrol }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="plate">Kode Ruangan / Inventaris</label><br>
                    <input type="text" name="plate" id="plate"
                        class="w-full p-2 border-2 border-orange-300 rounded-lg bg-gray-100"
                        value="{{ old('plate', $vehicle->plate) }}" disabled>
                </div>

                <div>
                    <label for="vehicle_color">Lokasi / Gedung</label><br>
                    <input type="text" name="vehicle_color" id="vehicle_color"
                        class="w-full p-2 border-2 border-orange-300 rounded-lg bg-gray-100"
                        value="{{ old('vehicle_color', $vehicle->vehicle_color) }}" disabled>
                </div>

                <div>
                    <label for="vehicle_type">Jenis Data</label><br>
                    <select name="vehicle_type" id="vehicle_type"
                        class="w-full p-2 border border-orange-300 rounded-lg bg-gray-100" disabled>
                        @foreach ($types as $type)
                            <option value="{{ $type }}" {{ old('vehicle_type', $vehicle->vehicle_type) == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="vehicle_seat">Kapasitas</label><br>
                    <input type="number" name="vehicle_seat" id="vehicle_seat"
                        class="w-full p-2 border-2 border-orange-300 rounded-lg bg-gray-100"
                        value="{{ old('vehicle_seat', $vehicle->vehicle_seat) }}" disabled>
                </div>

                <div>
                    <label for="vehicle_price">Biaya Peminjaman</label><br>
                    <input type="number" name="vehicle_price" id="vehicle_price"
                        class="w-full p-2 border-2 border-orange-300 rounded-lg bg-gray-100"
                        value="{{ old('vehicle_price', $vehicle->vehicle_price) }}" disabled>
                </div>

                <div>
                    <label for="vehicle_year">Tahun Pengadaan</label><br>
                    <input type="date" name="vehicle_year" id="vehicle_year"
                        class="w-full p-2 border-2 border-orange-300 rounded-lg bg-gray-100"
                        value="{{ old('vehicle_year', $vehicle->vehicle_year) }}" disabled>
                </div>

                <div>
                    <label for="vehicle_engine">Spesifikasi / Daya</label><br>
                    <input type="text" name="vehicle_engine" id="vehicle_engine"
                        class="w-full p-2 border-2 border-orange-300 rounded-lg bg-gray-100"
                        value="{{ old('vehicle_engine', $vehicle->vehicle_engine) }}" disabled>
                </div>

                <div>
                    <label for="vehicle_doors">Jumlah Akses / Pintu</label><br>
                    <input type="text" name="vehicle_doors" id="vehicle_doors"
                        class="w-full p-2 border-2 border-orange-300 rounded-lg bg-gray-100"
                        value="{{ old('vehicle_doors', $vehicle->vehicle_doors) }}" disabled>
                </div>

                <div>
                    <label for="vehicle_transmision">Kategori Tambahan</label><br>
                    <select name="vehicle_transmision" id="vehicle_transmision"
                        class="w-full p-2 border border-orange-300 rounded-lg bg-gray-100" disabled>
                        @foreach ($transmisions as $transmision)
                            <option value="{{ $transmision }}">{{ $transmision }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="vehicle_merk">Unit / Fakultas Penanggung Jawab</label><br>
                    <input type="text" name="vehicle_merk" id="vehicle_merk"
                        class="w-full p-2 border-2 border-orange-300 rounded-lg bg-gray-100"
                        value="{{ old('vehicle_merk', $vehicle->vehicle_merk) }}" disabled>
                </div>

                <div>
                    <label for="vehicle_status">Status Ketersediaan</label><br>
                    <select name="vehicle_status" id="vehicle_status"
                        class="w-full p-2 border border-orange-300 rounded-lg bg-gray-100" disabled>
                        @foreach ($status as $stats)
                            <option value="{{ $stats }}">{{ $stats }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="vehicle_image">Foto Ruangan / Inventaris</label><br>
                    <img
                        src="{{ asset('storage/' . $vehicle->vehicle_image) }}"
                        alt="{{ $vehicle->vehicle_name }}"
                        title="{{ $vehicle->vehicle_name }}"
                        class="mt-2 rounded-lg border-2 border-orange-300 w-48">
                </div>

            </div>
        </form>
    </div>
</x-layouts.app>