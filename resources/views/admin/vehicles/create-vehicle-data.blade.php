<x-layouts.app>
    <div class="mx-44">
        <h1 class="text-2xl font-bold">Tambah Data Ruangan & Inventaris</h1>
        <p class="text-sm">Form penambahan data ruangan dan inventaris ITENAS</p>

        <form action="{{ route('vehicles.store') }}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-2">

                <div>
                    <label for="vehicle_name">Nama Ruangan / Inventaris</label><br>
                    <input type="text" name="vehicle_name" id="vehicle_name"
                        class="w-full p-2 border-2 border-green-600 rounded-lg"
                        placeholder="Contoh: Ruang Rapat A / Proyektor Epson">
                </div>

                <div>
                    <label for="petrol">Sumber Daya</label><br>
                    <select name="petrol" id="petrol"
                        class="w-full p-2 text-white bg-green-500 border border-green-600 rounded-lg">
                        @foreach ($petrols as $petrol)
                            <option value="{{ $petrol }}">{{ $petrol }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="plate">Kode Ruangan / Inventaris</label><br>
                    <input type="text" name="plate" id="plate"
                        class="w-full p-2 border-2 border-green-600 rounded-lg"
                        placeholder="Contoh: R-ITN-01 / INV-PRJ-02">
                </div>

                <div>
                    <label for="vehicle_color">Lokasi / Gedung</label><br>
                    <input type="text" name="vehicle_color" id="vehicle_color"
                        class="w-full p-2 border-2 border-green-600 rounded-lg"
                        placeholder="Contoh: Gedung A Lantai 2">
                </div>

                <div>
                    <label for="vehicle_type">Jenis Data</label><br>
                    <select name="vehicle_type" id="vehicle_type"
                        class="w-full p-2 text-white bg-green-500 border border-green-600 rounded-lg">
                        @foreach ($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="vehicle_seat">Kapasitas</label><br>
                    <input type="number" name="vehicle_seat" id="vehicle_seat"
                        class="w-full p-2 border-2 border-green-600 rounded-lg"
                        placeholder="Jumlah orang / unit">
                </div>

                <div>
                    <label for="vehicle_price">Biaya Peminjaman</label><br>
                    <input type="number" name="vehicle_price" id="vehicle_price"
                        class="w-full p-2 border-2 border-green-600 rounded-lg"
                        placeholder="Isi 0 jika gratis">
                </div>

                <div>
                    <label for="vehicle_year">Tahun Pengadaan</label><br>
                    <input type="date" name="vehicle_year" id="vehicle_year"
                        class="w-full p-2 border-2 border-green-600 rounded-lg">
                </div>

                <div>
                    <label for="vehicle_engine">Spesifikasi / Daya</label><br>
                    <input type="text" name="vehicle_engine" id="vehicle_engine"
                        class="w-full p-2 border-2 border-green-600 rounded-lg"
                        placeholder="Contoh: 2200 Watt / Full HD">
                </div>

                <div>
                    <label for="vehicle_doors">Jumlah Akses / Pintu</label><br>
                    <input type="text" name="vehicle_doors" id="vehicle_doors"
                        class="w-full p-2 border-2 border-green-600 rounded-lg"
                        placeholder="Contoh: 2">
                </div>

                <div>
                    <label for="vehicle_transmision">Kategori Tambahan</label><br>
                    <select name="vehicle_transmision" id="vehicle_transmision"
                        class="w-full p-2 text-white bg-green-500 border border-green-600 rounded-lg">
                        @foreach ($transmisions as $transmision)
                            <option value="{{ $transmision }}">{{ $transmision }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="vehicle_merk">Unit / Fakultas Penanggung Jawab</label><br>
                    <input type="text" name="vehicle_merk" id="vehicle_merk"
                        class="w-full p-2 border-2 border-green-600 rounded-lg"
                        placeholder="Contoh: Fakultas Teknik">
                </div>

                <div>
                    <label for="vehicle_status">Status Ketersediaan</label><br>
                    <select name="vehicle_status" id="vehicle_status"
                        class="w-full p-2 text-white bg-green-500 border border-green-600 rounded-lg">
                        @foreach ($status as $stats)
                            <option value="{{ $stats }}">{{ $stats }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="vehicle_image">Foto Ruangan / Inventaris</label><br>
                    <input type="file" name="vehicle_image" id="vehicle_image"
                        class="w-full p-2 border-2 border-green-600 rounded-lg"
                        accept="image/*">
                </div>

            </div>

            <button type="submit"
                class="w-full p-2 mt-5 mb-5 text-white bg-green-600 rounded-lg hover:bg-green-700">
                Simpan Data
            </button>
        </form>
    </div>
</x-layouts.app>