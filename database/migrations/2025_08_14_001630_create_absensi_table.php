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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id')->nullable();
            $table->unsignedBigInteger('bukti_id')->nullable();
            $table->date('absen_tgl')->nullable();
            $table->time('absen_datang')->nullable();
            $table->time('absen_pulang')->nullable();
            $table->integer('absen_terlambat')->nullable();
            $table->text('absen_keterangan')->nullable();
            $table->boolean('absen_validasi')->default(0);
            $table->timestamps();

            // foreign keys
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('set null');
            $table->foreign('bukti_id')->references('id')->on('bukti')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
