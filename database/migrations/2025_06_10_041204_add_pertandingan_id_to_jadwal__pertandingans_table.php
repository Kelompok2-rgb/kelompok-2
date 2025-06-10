<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('jadwal__pertandingans', function (Blueprint $table) {
            $table->unsignedBigInteger('pertandingan_id')->after('id');
            $table->foreign('pertandingan_id')->references('id')->on('pertandingans')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::table('jadwal__pertandingans', function (Blueprint $table) {
            $table->dropForeign(['pertandingan_id']);
            $table->dropColumn('pertandingan_id');
        });
    }
};
