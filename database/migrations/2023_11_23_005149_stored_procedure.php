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
        DB::unprepared('DROP Procedure IF EXISTS CreateObat');
        DB::unprepared("
        CREATE PROCEDURE CreateObat(
            IN new_nama_obat VARCHAR(60),
            IN new_id_tipe INT,
            IN new_stock_obat INT,
            IN new_foto_obat TEXT
        )
        BEGIN
            INSERT INTO obat (nama_obat, id_tipe, stock_obat, foto_obat)
            VALUES (new_nama_obat, new_id_tipe, new_stock_obat, new_foto_obat); 
    END
        ");


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP Procedure IF EXISTS CreateObat');
    }
};
