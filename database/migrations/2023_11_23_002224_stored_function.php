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
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalObat');

        DB::unprepared('
        CREATE FUNCTION CountTotalObat() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM obat;
            RETURN total;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPasien');

        DB::unprepared('
        CREATE FUNCTION CountTotalPasien() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM pasien;
            RETURN total;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPendaftaran');

        DB::unprepared('
        CREATE FUNCTION CountTotalPendaftaran() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM pendaftaran;
            RETURN total;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalResep');

        DB::unprepared('
        CREATE FUNCTION CountTotalResepObat() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM resep_obat;
            RETURN total;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalRekam');

        DB::unprepared('
        CREATE FUNCTION CountTotalRekamMedis() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM rekam_medis;
            RETURN total;
        END
        ');

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalObat');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPasien');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPendaftaran');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalRekam');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalResep');
    }
};
