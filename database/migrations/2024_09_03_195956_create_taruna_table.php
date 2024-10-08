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
        Schema::create('taruna', function (Blueprint $table) {
            $table->id();
            $table->string('name',60);
            $table->string('foto',120)->nullable();
            $table->integer('jabatan_id');
            $table->string('periode',120);
            $table->string('nohp',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taruna');
    }
};
