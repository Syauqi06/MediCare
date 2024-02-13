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
        DB::unprepared("DROP VIEW IF EXISTS view_resep");

        DB::unprepared("
        CREATE VIEW view_resep AS
        SELECT
            re.id_resep AS id_resep,  
            r.id_rm AS id_rm,
            r.diagnosa AS diagnosa,
            re.tgl_pembuatan_resep AS tgl_pembuatan_resep,
            re.status_pengambilan_obat AS status_pengambilan_obat,
            d.id_dokter AS id_dokter,
            d.nama_dokter AS nama_dokter,
            t.id_tipe AS id_tipe
        FROM resep_obat re
        INNER JOIN rekam_medis r ON re.id_rm = r.id_rm
        INNER JOIN dokter d ON r.id_dokter = d.id_dokter
        INNER JOIN tipe t ON re.id_tipe = t.id_tipe;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP VIEW IF EXISTS view_resep");
    }
};
