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
        Schema::create('agenda_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('agenda_kategori',90);
            $table->string('nama_agenda',170);
            $table->string('waktu',150);
            $table->string('lokasi',150);
            $table->string('penanggungjawab',120);
            $table->string('ket',120);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_kegiatan');
    }
};
