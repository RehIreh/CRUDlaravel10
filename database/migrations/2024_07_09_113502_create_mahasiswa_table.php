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
        Schema::create('mahasiswa', function (Blueprint $table) {
            //$table->id();
            $table->timestamps();
            $table->string('nama');
            $table->integer('nomor_induk');
            $table->enum('jurusan',['Informatika','Sistem Informasi','Sistem Informasi Akutansi']);
            $table->text('alamat');
            $table->enum('SKS',['Paket 1','Paket 2','Paket 3']);
            $table->unique(array('nomor_induk'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
