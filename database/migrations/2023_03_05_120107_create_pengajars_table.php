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
        Schema::create('pengajars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengajar');
            $table->string('gambar_pengajar');
            $table->text('motivasi_pengajar');
            $table->string('jabatan_pengajar');
            $table->text('bio_pengajar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajars');
    }
};
