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
    Schema::create('atlets', function (Blueprint $table) {

        $table->id();
        $table->string('nama');
        $table->string('foto');
        $table->string('prestasi');
        $table->string('statistik_pertandingan');
        $table->string('training_record');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atlets');
    }
};





