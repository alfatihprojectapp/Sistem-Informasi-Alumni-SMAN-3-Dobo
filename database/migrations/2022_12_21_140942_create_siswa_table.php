<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->foreignId('id')->nullable();
            $table->foreignId('id_jurusan')->nullable();
            $table->foreignId('id_tahun')->nullable();
            $table->string('nisn')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('kartu_kip')->nullable();

            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('alamat_ortu_wali')->nullable();
            $table->string('nomor_ortu_wali')->nullable();

            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
