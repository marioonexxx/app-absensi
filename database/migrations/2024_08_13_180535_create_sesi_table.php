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
        Schema::create('sesi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sesi')->nullable(); // sesi pagi/siang
            $table->time('jamdatang_mulai')->nullable();
            $table->time('jamdatang_selesai')->nullable();
            $table->time('jampulang_mulai')->nullable();
            $table->time('jampulang_selesai')->nullable();
            $table->time('batas_telat')->nullable();
                  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi');
    }
};
