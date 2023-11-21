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
        Schema::create('masuk_obat', function (Blueprint $table) {
            $table->integer('id_masuk_obat', true);
            $table->integer('id_obat');
            $table->date('tgl_expired');
            $table->date('tgl_masuk_obat');
            $table->integer('jumlah_masuk');
            $table->foreign('id_obat')->on('obat')->references('id_obat')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masuk_obat');
    }
};
