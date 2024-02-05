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
        Schema::create('isi_reseps', function (Blueprint $table) {
            $table->integer('id_isi_resep', true);
            $table->integer('id_resep');
            $table->integer('id_obat');
            $table->text('aturan_pemakaian');
            $table->integer('dosis');
            $table->foreign('id_resep')->on('resepobat')->references('id_resep')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_obat')->on('obat')->references('id_obat')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isi_reseps');
    }
};
