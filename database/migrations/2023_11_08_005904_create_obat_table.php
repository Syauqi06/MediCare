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
            $table->integer('id_tipe');
            $table->text('nama_obat')->nullable(false);
            $table->integer('stock_obat')->nullable(false);
            $table->text('foto_obat');
            $table->foreign('id_tipe')->on('tipe')->references('id_tipe')->onDelete('cascade')->onUpdate('cascade');

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
