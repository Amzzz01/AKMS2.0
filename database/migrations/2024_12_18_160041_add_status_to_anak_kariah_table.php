<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('anak_kariah', function (Blueprint $table) {
            $table->string('status')->default('Active'); // Add a 'status' column
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('anak_kariah', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('deleted_at');
        });
    }
};
