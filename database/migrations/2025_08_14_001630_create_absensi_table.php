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
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->unsignedBigInteger('sesi_id')->nullable();
            $table->date('absen_tgl')->nullable(); //tgl absen
            $table->time('absen_datang')->nullable(); //jam datang siswa
            $table->time('absen_pulang')->nullable(); //jam pulang siswa
            $table->time('absen_terlambat')->nullable(); // jam perhitungan terlambat
            $table->string('absen_keterangan')->nullable(); // sakit, ijin, alpa (bisa dimodifikasi nanti oleh orang tua/wali  kelas)
            $table->string('absen_bukti')->nullable(); // orang tua/wali kelas upload file surat sakit/ijin
            $table->string('absen_validasi')->nullable(); // hasil validasi bukti 
            $table->timestamps();


            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('sesi_id')->references('id')->on('sesi')->onDelete('set null');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
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
