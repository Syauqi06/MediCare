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

        DB::unprepared("DROP VIEW IF EXISTS view_rekam;");

        DB::unprepared("
        CREATE VIEW view_rekam AS
        SELECT
            re.id_rm AS id_rm, 
            p.nama_pasien AS nama_pasien,
            d.nama_dokter AS nama_dokter,
            re.tgl_pemeriksaan AS tgl_pemeriksaan,
            re.diagnosa AS diagnosa
        FROM rekam_medis re
        INNER JOIN pasien p ON p.id_pasien = p.id_pasien
        INNER JOIN dokter d ON d.id_dokter = d.id_dokter;

        ");
        DB::unprepared("DROP VIEW IF EXISTS view_resep");

        DB::unprepared("
        CREATE VIEW view_resep AS
        SELECT
        re.id_resep AS id_resep,  
        r.id_rm AS id_rm,
        re.tgl_pembuatan_resep AS tgl_pembuatan_resep,
        re.status_pengambilan_obat AS status_pengambilan_obat,
        d.id_dokter AS id_dokter,
        d.nama_dokter AS nama_dokter,
        t.id_tipe AS id_tipe
    FROM resep_obat re
    INNER JOIN rekam_medis r ON re.id_rm = r.id_rm
    INNER JOIN dokter d ON re.id_dokter = d.id_dokter
    INNER JOIN tipe t ON re.id_tipe = t.id_tipe;
    ");

    DB::unprepared("DROP VIEW IF EXISTS view_resepsionis");

        DB::unprepared("
        CREATE VIEW view_resepsionis AS
        SELECT
        re.id_pendaftaran AS id_pendafataran,  
        r.id_rm AS id_rm,
        re.tgl_pembuatan_resep AS tgl_pembuatan_resep,
        re.status_pengambilan_obat AS status_pengambilan_obat,
        d.id_dokter AS id_dokter,
        d.nama_dokter AS nama_dokter,
        t.id_tipe AS id_tipe
    FROM resep_obat re
    INNER JOIN rekam_medis r ON re.id_rm = r.id_rm
    INNER JOIN dokter d ON re.id_dokter = d.id_dokter
    INNER JOIN tipe t ON re.id_tipe = t.id_tipe;
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_tipe');
        DB::unprepared("DROP VIEW IF EXISTS view_tipe;");
        DB::unprepared("DROP VIEW IF EXISTS view_resep");
    }
};
