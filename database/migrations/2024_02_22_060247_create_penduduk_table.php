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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap',120);
            $table->string('alamat',120);
            $table->string('rt',6);
            $table->enum('jk',['Laki-laki', 'Perempuan']);
            $table->string('status_perkawinan',120);
            $table->string('tempat',120);
            $table->date('tgl_lahir');
            $table->enum('agama',['Islam','Kristen','Katolik','Hindu','Budha','Konghucu']);
            $table->enum('pendidikan_terakhir',['SD','SMP','SMU','S1','S2','S3']);
            $table->string('pekerjaan',90);
            $table->string('status_keluarga',90);
            $table->string('status_rumah_tinggal',90);
            $table->string('status_ekonomi',90);
            $table->string('role',30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
