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
        Schema::create('detail_hasil_pertandingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_pertandingan_id')->constrained('hasil_pertandingans')->onDelete('cascade');
            $table->string('nama');
            $table->float('skor');
            $table->integer('rangking')->nullable();
            $table->text('catatan_juri')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_hasil_pertandingans');
    }
};
