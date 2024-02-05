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
        Schema::create('dokter', function (Blueprint $table) {
            $table->integer('id_dokter', true);
            $table->integer('id_poli',false);
            $table->string('nama_dokter')->nullable(false);
            $table->text('foto_dokter')->nullable(false);
            $table->integer('no_telp')->nullable(false);

            $table->foreign('id_poli')->on('poli')->references('id_poli')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
