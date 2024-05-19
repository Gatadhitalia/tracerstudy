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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_job');
            $table->string('periode_masuk_job');            
            $table->string('periode_keluar_job');
            $table->string('alamat_job');
            $table->string('prov_job');
            $table->string('kota_job');
            $table->string('link_job');
            $table->string('jns_job');
            $table->string('jabatan_job');
            $table->longText('deskripsi_job');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};