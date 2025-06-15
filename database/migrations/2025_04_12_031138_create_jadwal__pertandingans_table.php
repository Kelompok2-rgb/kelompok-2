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
        Schema::create('jadwal_pertandingans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertandingan_id'); // FK ke tabel pertandingan
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi');
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('pertandingan_id')->references('id')->on('pertandingans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pertandingans');
    }
};
