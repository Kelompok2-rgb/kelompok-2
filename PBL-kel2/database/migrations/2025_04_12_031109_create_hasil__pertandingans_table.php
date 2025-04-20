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
    Schema::create('hasil__pertandingans', function (Blueprint $table) {

        $table->id();
        $table->string('skor');
        $table->string('rangking');
        $table->text('catatan_juri');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil__pertandingans');
    }
};





