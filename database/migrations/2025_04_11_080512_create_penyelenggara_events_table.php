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
    Schema::create('penyelenggara_events', function (Blueprint $table) {
        $table->id(); // ini = bigIncrements() = unsignedBigInteger auto increment
        $table->string('nama_penyelenggara_event');
        $table->string('kontak');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyelenggara_event');
    }
};