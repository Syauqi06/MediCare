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
        Schema::create('pasien', function (Blueprint $table) {
            $table->integer('id_pasien',true);
            $table->integer('id_akun');
            $table->string('nama_pasien',20)->nullable(false);
            $table->text('alamat')->nullable(false);
            $table->date('tgl_lahir')->nullable(false);
            $table->string('foto_ktp', 200)->nullable(false);
            // Foreign Key

            $table->foreign('id_akun')->on('akun')->references('id_akun')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
