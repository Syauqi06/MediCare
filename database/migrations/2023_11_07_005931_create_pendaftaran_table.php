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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->integer('id_pendaftaran',true);
            $table->integer('id_pasien');
            $table->date('tgl_pendaftaran')->nullable(false);
            $table->integer('nomor_antrian')->nullable(false);
            $table->text('keluhan')->nullable(false);

            $table->foreign('id_pasien')->on('pasien')->references('id_pasien')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
