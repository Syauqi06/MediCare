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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->integer('id_rm', true);
            $table->integer('id_asdok');
            $table->integer('id_pendaftaran');
            $table->integer('id_dokter');
            $table->text('hasil_diagnosa')->nullable(false);
            $table->date('tgl_pendaftaran')->nullable(false);

            $table->foreign('id_asdok')->on('asisten_dokter')->references('id_asdok')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pendaftaran')->on('pendaftaran')->references('id_pendaftaran')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dokter')->on('dokter')->references('id_dokter')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
