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
           DECLARE pesan_error CHAR(5) DEFAULT '000';
           DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
        
           BEGIN
           GET DIAGNOSTICS CONDITION 1
           pesan_error = RETURNED_SQLSTATE;
           END;

           START TRANSACTION;
           savepoint satu;
            INSERT INTO obat (nama_obat, id_obat, stock_obat, foto_obat)
            VALUES (new_nama_obat, new_id_obat, new_stock_obat, new_foto_obat);
            
            IF pesan_error != '000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
    END;
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
