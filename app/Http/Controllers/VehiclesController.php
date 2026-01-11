<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehiclesController extends Controller
{
    /**
     * MENAMPILKAN DATA RUANGAN & INVENTARIS
     */
    public function index()
    {
        $vehicles = Vehicles::all();
        return view('admin.vehicles.view-vehicle-data', compact('vehicles'));
    }

    /**
     * FORM TAMBAH RUANGAN / INVENTARIS
     */
    public function create()
    {
        // Dialihkan maknanya
        $petrols = ['-', 'listrik', 'manual']; // sumber daya
        $types = ['ruangan', 'inventaris'];   // tipe data
        $transmisions = ['-', 'manual'];      // dummy (biar blade aman)

        $status = [
            'tersedia',
            'dipinjam',
            'maintenance',
            'tidak_tersedia',
            'dibooking'
        ];

        return view(
            'admin.vehicles.create-vehicle-data',
            compact('petrols', 'types', 'transmisions', 'status')
        );
    }

    /**
     * SIMPAN DATA RUANGAN / INVENTARIS
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required|string|max:255', // nama ruangan / barang
            'petrol' => 'required|string',               // sumber daya
            'plate' => 'required|string',                // kode ruangan / inventaris
            'vehicle_color' => 'required|string',        // lokasi / gedung
            'vehicle_type' => 'required|in:ruangan,inventaris',
            'vehicle_seat' => 'required|numeric|min:0',  // kapasitas
            'vehicle_price' => 'required|numeric|min:0', // biaya sewa (jika ada)
            'vehicle_year' => 'required|date',           // tahun pengadaan
            'vehicle_engine' => 'required|numeric|min:0',// daya / spesifikasi
            'vehicle_doors' => 'required|numeric|min:0', // akses / pintu
            'vehicle_transmision' => 'required|string',  // dummy
            'vehicle_merk' => 'required|string',         // merk / unit
            'vehicle_status' => 'required|in:tersedia,dipinjam,maintenance,tidak_tersedia,dibooking',
            'vehicle_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('vehicle_image')
            ? $request->file('vehicle_image')->store('inventaris', 'public')
            : null;

        Vehicles::create([
            'vehicle_name' => $request->vehicle_name,
            'petrol' => $request->petrol,
            'plate' => $request->plate,
            'vehicle_color' => $request->vehicle_color,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_seat' => $request->vehicle_seat,
            'vehicle_price' => $request->vehicle_price,
            'vehicle_year' => $request->vehicle_year,
            'vehicle_engine' => $request->vehicle_engine,
            'vehicle_doors' => $request->vehicle_doors,
            'vehicle_transmision' => $request->vehicle_transmision,
            'vehicle_merk' => $request->vehicle_merk,
            'vehicle_status' => $request->vehicle_status,
            'vehicle_image' => $imagePath,
        ]);

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Berhasil menambahkan data ruangan / inventaris');
    }

    /**
     * DETAIL DATA
     */
    public function show(Vehicles $vehicle)
    {
        $petrols = ['-', 'listrik', 'manual'];
        $types = ['ruangan', 'inventaris'];
        $transmisions = ['-', 'manual'];
        $status = ['tersedia', 'dipinjam', 'maintenance', 'tidak_tersedia', 'dibooking'];

        return view(
            'admin.vehicles.details-vehicle-data',
            compact('vehicle', 'petrols', 'types', 'transmisions', 'status')
        );
    }

    /**
     * FORM EDIT
     */
    public function edit(Vehicles $vehicle)
    {
        $petrols = ['-', 'listrik', 'manual'];
        $types = ['ruangan', 'inventaris'];
        $transmisions = ['-', 'manual'];
        $status = ['tersedia', 'dipinjam', 'maintenance', 'tidak_tersedia', 'dibooking'];

        return view(
            'admin.vehicles.edit-vehicle-data',
            compact('vehicle', 'petrols', 'types', 'transmisions', 'status')
        );
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, Vehicles $vehicle)
    {
        $request->validate([
            'vehicle_name' => 'string|max:255',
            'petrol' => 'string',
            'plate' => 'string',
            'vehicle_color' => 'string',
            'vehicle_type' => 'in:ruangan,inventaris',
            'vehicle_seat' => 'numeric|min:0',
            'vehicle_price' => 'numeric|min:0',
            'vehicle_year' => 'date',
            'vehicle_engine' => 'numeric|min:0',
            'vehicle_doors' => 'numeric|min:0',
            'vehicle_transmision' => 'string',
            'vehicle_merk' => 'string',
            'vehicle_status' => 'in:tersedia,dipinjam,maintenance,tidak_tersedia,dibooking',
            'vehicle_image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('vehicle_image')) {
            if ($vehicle->vehicle_image) {
                Storage::disk('public')->delete($vehicle->vehicle_image);
            }
            $imagePath = $request->file('vehicle_image')->store('inventaris', 'public');
        } else {
            $imagePath = $vehicle->vehicle_image;
        }

        $vehicle->update([
            'vehicle_name' => $request->vehicle_name,
            'petrol' => $request->petrol,
            'plate' => $request->plate,
            'vehicle_color' => $request->vehicle_color,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_seat' => $request->vehicle_seat,
            'vehicle_price' => $request->vehicle_price,
            'vehicle_year' => $request->vehicle_year,
            'vehicle_engine' => $request->vehicle_engine,
            'vehicle_doors' => $request->vehicle_doors,
            'vehicle_transmision' => $request->vehicle_transmision,
            'vehicle_merk' => $request->vehicle_merk,
            'vehicle_status' => $request->vehicle_status,
            'vehicle_image' => $imagePath,
        ]);

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Data ruangan / inventaris berhasil diperbarui');
    }

    /**
     * HAPUS DATA
     */
    public function destroy(Vehicles $vehicle)
    {
        if ($vehicle->vehicle_image) {
            Storage::disk('public')->delete($vehicle->vehicle_image);
        }

        $vehicle->delete();

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Data ruangan / inventaris berhasil dihapus');
    }
}