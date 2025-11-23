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
        Schema::create('kariah_boundaries', function (Blueprint $table) {
            $table->id();
            $table->string('area_name'); // e.g., "Kampung Luar", "Taman Bagan Indah"
            $table->text('boundary_polygon'); // GeoJSON polygon coordinates
            $table->string('color')->default('#3498db'); // Boundary color on map
            $table->boolean('is_active')->default(true);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Insert default mosque location
        Schema::create('mosque_location', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Masjid Al-Irsyad');
            $table->decimal('latitude', 10, 7)->default(1.4556); // Default: Telok Bagan area
            $table->decimal('longitude', 10, 7)->default(103.7645);
            $table->integer('zoom_level')->default(15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kariah_boundaries');
        Schema::dropIfExists('mosque_location');
    }
};