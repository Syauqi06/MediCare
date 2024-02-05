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
        Schema::create('apoteker', function (Blueprint $table) {
            $table->integer('id_apoteker', true);
            $table->integer('id_akun');
            $table->string('nama_apoteker')->nullable(false);
            $table->text('foto_apoteker')->nullable(false);
            $table->integer('no_telp')->nullable(false);

            $table->foreign('id_akun')->on('akun')->references('id_akun')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apoteker');
    }
};
