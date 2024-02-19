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
        DB::unprepared('DROP PROCEDURE IF EXISTS CreateObat');

        DB::unprepared('
        CREATE PROCEDURE CreateObat(
            IN new_nama_obat VARCHAR(60),
            IN new_id_tipe INT,
            IN new_stock_obat INT,
            IN new_foto_obat TEXT
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT "00000";
            BEGIN
            
            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO obat (nama_obat, id_tipe, stock_obat, foto_obat)
            VALUES (new_nama_obat, new_id_tipe, new_stock_obat, new_foto_obat);

            IF pesan_error != "00000" THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END;
    ');

        DB::unprepared('DROP PROCEDURE IF EXISTS CreateDokter');

        DB::unprepared('
        CREATE PROCEDURE CreateDokter(
            p_nama_dokter VARCHAR(255),
            p_id_poli INT,
            p_no_telp INT,
            p_foto_dokter TEXT
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT "00000";
            BEGIN

            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO dokter(nama_dokter, id_poli, no_telp, foto_dokter)
            VALUES (p_nama_dokter, p_id_poli, p_no_telp, p_foto_dokter);

            IF pesan_error != "00000" THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END;
    ');

    DB::unprepared('DROP PROCEDURE IF EXISTS CreatePoli');

    DB::unprepared('
        CREATE PROCEDURE CreatePoli(
            IN new_jenis_poli TEXT
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT "00000";

            BEGIN
                GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO poli (jenis_poli)
            VALUES (new_jenis_poli);

            IF pesan_error != "00000" THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END;
    ');

    DB::unprepared('DROP PROCEDURE IF EXISTS CreateRekamMedis');

    DB::unprepared('
        CREATE PROCEDURE CreateRekamMedis(
            IN new_id_pasien INT,
            IN new_id_dokter INT,
            IN new_diagnosa TEXT,
            IN new_tgl_pemeriksaan DATE
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT "00000";
            BEGIN
            
            GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO rekam_medis (id_pasien, id_dokter, diagnosa, tgl_pemeriksaan)
            VALUES (new_id_pasien, new_id_dokter, new_diagnosa, new_tgl_pemeriksaan);

            IF pesan_error != "00000" THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END;
    ');

    DB::unprepared('DROP PROCEDURE IF EXISTS CreateResepObat');

    DB::unprepared('
        CREATE PROCEDURE CreateResepObat(
            IN new_id_tipe INT,
            IN new_id_rm INT,
            IN new_id_dokter INT,
            IN new_tgl_pembuatan_resep DATE,
            IN new_status_pengambilan_obat TEXT
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT "00000";

            BEGIN
                GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO resep_obat (id_tipe, id_rm, id_dokter, tgl_pembuatan_resep, status_pengambilan_obat)
            VALUES (new_id_tipe, new_id_rm, new_id_dokter, new_tgl_pembuatan_resep, new_status_pengambilan_obat);

            IF pesan_error != "00000" THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END;
    ');

    DB::unprepared('DROP PROCEDURE IF EXISTS CreatePendaftaran');

    DB::unprepared('
        CREATE PROCEDURE CreatePendaftaran(
            IN new_id_pasien INT,
            IN new_tgl_pendaftaran DATE,
            IN new_nomor_antrian INT,
            IN new_keluhan TEXT
        )
        BEGIN
            DECLARE pesan_error CHAR(5) DEFAULT "00000";

            BEGIN
                GET DIAGNOSTICS CONDITION 1 pesan_error = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            INSERT INTO pendaftaran (id_pasien, tgl_pendaftaran, nomor_antrian, keluhan)
            VALUES (new_id_pasien, new_tgl_pendaftaran, new_nomor_antrian, new_keluhan);

            IF pesan_error != "00000" THEN
                ROLLBACK TO satu;
            END IF;

            COMMIT;
        END;
    ');


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS CreatePendaftaran');
        DB::unprepared('DROP PROCEDURE IF EXISTS CreateObat');
        DB::unprepared('DROP PROCEDURE IF EXISTS CreatePoli');
        DB::unprepared('DROP PROCEDURE IF EXISTS CreateDokter');
        DB::unprepared('DROP PROCEDURE IF EXISTS CreateRekamMedis');
        DB::unprepared('DROP PROCEDURE IF EXISTS CreateResepObat');
    }
};
