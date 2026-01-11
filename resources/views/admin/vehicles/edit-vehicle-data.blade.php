<x-layouts.app>
    <div class="mx-44">
        <h1 class="text-2xl font-bold text-orange-600">
            Edit Data Ruangan & Inventaris
        </h1>
        <p class="text-sm text-gray-600">
            Perbarui data ruangan dan inventaris ITENAS
        </p>

        <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-2">

                <div>
                    <label for="vehicle_name">Nama Ruangan / Inventaris</label><br>
                    <input type="text" name="vehicle_name" id="vehicle_name"
                        class="w-full p-2 border-2 border-orange-400 rounded-lg"
                        value="{{ old('vehicle_name', $vehicle->vehicle_name) }}"
                        placeholder="Contoh: Ruang Rapat A / Laptop Dell">
                </div>

                <div>
                    <label for="petrol">Sumber Daya</label><br>
                    <select name="petrol" id="petrol"
                        class="w-full p-2 text-white bg-orange-500 border border-orange-600 rounded-lg">
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
                        class="w-full p-2 border-2 border-orange-400 rounded-lg"
                        value="{{ old('plate', $vehicle->plate) }}"
                        placeholder="Contoh: R-ITN-01">
                </div>

                <div>
                    <label for="vehicle_color">Lokasi / Gedung</label><br>
                    <input type="text" name="vehicle_color" id="vehicle_color"
                        class="w-full p-2 border-2 border-orange-400 rounded-lg"
                        value="{{ old('vehicle_color', $vehicle->vehicle_color) }}"
                        placeholder="Gedung / Lantai">
                </div>

                <div>
                    <label for="vehicle_type">Jenis Data</label><br>
                    <select name="vehicle_type" id="vehicle_type"
                        class="w-full p-2 text-white bg-orange-500 border border-orange-600 rounded-lg">
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
                        class="w-full p-2 border-2 border-orange-400 rounded-lg"
                        value="{{ old('vehicle_seat', $vehicle->vehicle_seat) }}"
                        placeholder="Jumlah orang / unit">
                </div>

                <div>
                    <label for="vehicle_price">Biaya Peminjaman</label><br>
                    <input type="number" name="vehicle_price" id="vehicle_price"
                        class="w-full p-2 border-2 border-orange-400 rounded-lg"
                        value="{{ old('vehicle_price', $vehicle->vehicle_price) }}"
                        placeholder="Isi 0 jika gratis">
                </div>

                <div>
                    <label for="vehicle_year">Tahun Pengadaan</label><br>
                    <input type="date" name="vehicle_year" id="vehicle_year"
                        class="w-full p-2 border-2 border-orange-400 rounded-lg"
                        value="{{ old('vehicle_year', $vehicle->vehicle_year) }}">
                </div>

                <div>
                    <label for="vehicle_engine">Spesifikasi / Daya</label><br>
                    <input type="text" name="vehicle_engine" id="vehicle_engine"
                        class="w-full p-2 border-2 border-orange-400 rounded-lg"
                        value="{{ old('vehicle_engine', $vehicle->vehicle_engine) }}"
                        placeholder="Contoh: 2200 Watt / Core i5">
                </div>

                <div>
                    <label for="vehicle_doors">Jumlah Akses / Pintu</label><br>
                    <input type="text" name="vehicle_doors" id="vehicle_doors"
                        class="w-full p-2 border-2 border-orange-400 rounded-lg"
                        value="{{ old('vehicle_doors', $vehicle->vehicle_doors) }}"
                        placeholder="Contoh: 2">
                </div>

                <div>
                    <label for="vehicle_transmision">Kategori Tambahan</label><br>
                    <select name="vehicle_transmision" id="vehicle_transmision"
                        class="w-full p-2 text-white bg-orange-500 border border-orange-600 rounded-lg">
                        @foreach ($transmisions as $transmision)
                            <option value="{{ $transmision }}">{{ $transmision }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="vehicle_merk">Unit / Fakultas Penanggung Jawab</label><br>
                    <input type="text" name="vehicle_merk" id="vehicle_merk"
                        class="w-full p-2 border-2 border-orange-400 rounded-lg"
                        value="{{ old('vehicle_merk', $vehicle->vehicle_merk) }}"
                        placeholder="Contoh: Fakultas Teknik">
                </div>

                <div>
                    <label for="vehicle_status">Status Ketersediaan</label><br>
                    <select name="vehicle_status" id="vehicle_status"
                        class="w-full p-2 text-white bg-orange-500 border border-orange-600 rounded-lg">
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
                        class="mt-2 w-48 rounded-lg border-2 border-orange-400">
                </div>

            </div>

            <button type="submit"
                class="w-full p-2 mt-5 mb-5 text-white bg-orange-600 rounded-lg hover:bg-orange-700">
                Simpan Perubahan
            </button>
        </form>
    </div>
</x-layouts.app>