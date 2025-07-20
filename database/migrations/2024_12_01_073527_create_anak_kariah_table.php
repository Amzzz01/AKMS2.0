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
        Schema::create('anak_kariah', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('ic_number')->unique();
            $table->text('address');
            $table->string('phone_number');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak_kariah');
    }
};
