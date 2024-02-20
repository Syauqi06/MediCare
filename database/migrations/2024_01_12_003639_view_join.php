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
            t.id_tipe AS id_tipe,
            t.nama_tipe AS nama_tipe
        FROM resep_obat re
        JOIN rekam_medis r ON re.id_rm = r.id_rm
        JOIN dokter d ON re.id_dokter = d.id_dokter
        JOIN tipe t ON re.id_tipe = t.id_tipe;
        ");

        DB::unprepared("DROP VIEW IF EXISTS view_dokter");

        DB::unprepared("
        CREATE VIEW view_dokter AS
        SELECT
            d.id_dokter AS id_dokter,
            d.nama_dokter AS nama_dokter,
            d.foto_dokter AS foto_dokter,
            d.no_telp AS no_telp,
            p.jenis_poli AS jenis_poli
        FROM dokter d
        INNER JOIN poli p ON d.id_poli = p.id_poli;
        ");

        DB::unprepared("DROP VIEW IF EXISTS view_poli");

        DB::unprepared("
        CREATE VIEW view_poli AS
        SELECT
            id_poli,
            jenis_poli
        FROM poli
        ");

        DB::unprepared("DROP VIEW IF EXISTS view_poli");

        DB::unprepared("
        CREATE VIEW view_poli AS
        SELECT
            id_poli,
            jenis_poli
        FROM poli
        ");

        DB::unprepared("DROP VIEW IF EXISTS view_rekam_medis");

        DB::unprepared("
            CREATE VIEW view_rekam_medis AS
            SELECT
                rm.id_rm AS id_rm,
                rm.id_pasien AS id_pasien,
                rm.id_dokter AS id_dokter,
                rm.diagnosa AS diagnosa,
                rm.tgl_pemeriksaan AS tgl_pemeriksaan,
                p.nama_pasien AS nama_pasien,
                d.nama_dokter AS nama_dokter
            FROM rekam_medis rm
            JOIN pasien p ON rm.id_pasien = p.id_pasien
            JOIN dokter d ON rm.id_dokter = d.id_dokter;
        ");
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP VIEW IF EXISTS view_resep");
        DB::unprepared("DROP VIEW IF EXISTS view_dokter");
        DB::unprepared("DROP VIEW IF EXISTS view_poli");
        DB::unprepared("DROP VIEW IF EXISTS view_rekam_medis");
    }
};
