<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Check if table doesn't exist before creating
        if (!Schema::hasTable('mosque_location')) {
            Schema::create('mosque_location', function (Blueprint $table) {
                $table->id();
                $table->string('name')->default('Masjid Al-Irsyad');
                $table->decimal('latitude', 10, 7)->default(1.4556);
                $table->decimal('longitude', 10, 7)->default(103.7645);
                $table->integer('zoom_level')->default(15);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('mosque_location');
    }
};