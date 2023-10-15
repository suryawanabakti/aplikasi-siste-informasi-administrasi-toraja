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
        Schema::create('permohonan_surat', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('jenis_surat'); // Surat Keterangan Tidak Mampu, Pindah Penduduk
            $table->string('foto_ktp')->nullable();
            $table->string('foto_kk')->nullable();
            $table->string('foto_akte')->nullable();
            $table->text('kk_tujuan')->nullable();
            $table->string('pekerjaan')->default('Belum Ada');
            $table->string('hari')->nullable();
            $table->text('penyebab')->nullable();
            $table->string('di')->nullable();
            $table->date('tanggal')->nullable();

            $table->string('nomor_surat')->nullable();
            $table->string('nama')->nullable();
            $table->enum('approve', ['proses', 'terima', 'tolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_surats');
    }
};
