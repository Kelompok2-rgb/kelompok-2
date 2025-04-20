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
    Schema::create('anggotas', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('foto');
        $table->string('tgl_lahir');
        $table->string('peran');
        $table->string('riwayat_prestasi');
        $table->string('kontak');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};



