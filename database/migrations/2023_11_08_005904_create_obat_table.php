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
        Schema::create('obat', function (Blueprint $table) {
            $table->integer('id_obat', true);
            $table->integer('id_masuk_obat');
            $table->integer('id_apoteker');
            $table->text('nama_obat')->nullable(false);
            $table->text('jenis_obat')->nullable(false);
            $table->integer('stock_obat')->nullable(false);

            $table->foreign('id_masuk_obat')->on('masuk_obat')->references('id_masuk_obat')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_apoteker')->on('apoteker')->references('id_apoteker')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
