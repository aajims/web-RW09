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
        Schema::create('jadwal_personil_security', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jadwal_id');
            $table->unsignedBigInteger('keamanan_id',11);
            $table->foreign('jadwal_id')->references('id')->on('jadwal')->onDelete('cascade');
            $table->foreign('keamanan_id')->references('id')->on('keamanan')->onDelete('cascade');
            $table->primary(['jadwal_id', 'keamanan_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_personil_security');
    }
};
