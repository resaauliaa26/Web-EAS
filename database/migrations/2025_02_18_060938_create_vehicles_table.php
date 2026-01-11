<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->string('vehicle_name');

            // Jenis BBM (lowercase & konsisten)
            $table->enum('petrol', [
                'pertalite',
                'pertamax',
                'pertamax_turbo',
                'solar'
            ]);

            $table->string('plate')->unique();
            $table->string('vehicle_color');

            // Jenis kendaraan kampus
            $table->enum('vehicle_type', [
                'motor',
                'mobil',
                'truck'
            ]);

            $table->unsignedInteger('vehicle_seat')->nullable();
            $table->unsignedBigInteger('vehicle_price')->nullable();

            // Tahun kendaraan (lebih tepat YEAR daripada DATE)
            $table->year('vehicle_year');

            $table->unsignedInteger('vehicle_engine')->comment('CC mesin');
            $table->unsignedInteger('vehicle_doors')->nullable();

            $table->enum('vehicle_transmision', [
                'manual',
                'automatic'
            ]);

            $table->string('vehicle_merk');

            // Status peminjaman
            $table->enum('vehicle_status', [
                'tersedia',
                'dibooking',
                'disewa',
                'maintenance',
                'tidak_tersedia'
            ])->default('tersedia');

            $table->string('vehicle_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
