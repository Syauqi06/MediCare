<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("DROP VIEW IF EXISTS view_tipe;");

        DB::unprepared("
        CREATE VIEW view_tipe AS
        SELECT
            d.id_obat AS id_obat, 
            d.nama_obat AS nama_obat,
            d.stock_obat AS stock_obat,
            d.foto_obat AS foto_obat,
            t.id_tipe AS id_tipe,
            t.nama_tipe AS nama_tipe
        FROM obat d
        INNER JOIN tipe t ON d.id_tipe = t.id_tipe

        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_tipe');
        DB::unprepared("DROP VIEW IF EXISTS view_tipe;");
    }
};
