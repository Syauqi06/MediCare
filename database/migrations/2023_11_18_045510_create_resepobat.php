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
        Schema::create('resep_obat', function (Blueprint $table) {
            $table->integer('id_resep', true);
            $table->integer('id_tipe');
            $table->integer('id_rm');
            $table->integer('id_dokter');
            $table->date('tgl_pembuatan_resep');
            $table->text('status_pengambilan_obat');

            $table->foreign('id_tipe')->on('tipe')->references('id_tipe')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_rm')->on('rekam_medis')->references('id_rm')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dokter')->on('dokter')->references('id_dokter')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_obat');
    }
};
