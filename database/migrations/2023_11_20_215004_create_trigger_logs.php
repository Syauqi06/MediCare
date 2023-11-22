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
        DB::unprepared('
        CREATE TRIGGER add_obat
        BEFORE INSERT ON obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("data_obat", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
    ');
        DB::unprepared('
        CREATE TRIGGER update_obat
        BEFORE UPDATE ON obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("data_obat", CURDATE(), CURTIME(), "Update", "Sukses");
        END
    ');
        DB::unprepared('
        CREATE TRIGGER delete_obat
        BEFORE DELETE ON obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("data_obat", CURDATE(), CURTIME(), "Delete", "Sukses");
        END
    ');
    DB::unprepared('
    CREATE TRIGGER add_rekam_medis
    BEFORE INSERT ON rekam_medis
    FOR EACH ROW
    BEGIN
        INSERT logs(tabel, tanggal, jam, aksi, record)
        VALUES ("rekam_medis", CURDATE(), CURTIME(), "Tambah", "Sukses");
    END
        ');
    DB::unprepared('
    CREATE TRIGGER update_rekam_medis
    BEFORE UPDATE ON rekam_medis
    FOR EACH ROW
    BEGIN
        INSERT logs(tabel, tanggal, jam, aksi, record)
        VALUES ("rekam_medis", CURDATE(), CURTIME(), "Update", "Sukses");
    END
        ');
    DB::unprepared('
    CREATE TRIGGER delete_rekam_medis
    BEFORE DELETE ON rekam_medis
    FOR EACH ROW
    BEGIN
        INSERT logs(tabel, tanggal, jam, aksi, record)
        VALUES ("rekam_medis", CURDATE(), CURTIME(), "Delete", "Sukses");
    END
        ');

        DB::unprepared('
        CREATE TRIGGER add_masuk_obat
        BEFORE INSERT ON masuk_obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("masuk_obat", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER update_masuk_obat
        BEFORE UPDATE ON masuk_obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("masuk_obat", CURDATE(), CURTIME(), "Update", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER delete_masuk_obat
        BEFORE DELETE ON masuk_obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("masuk_obat", CURDATE(), CURTIME(), "Delete", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER add_tipe
        BEFORE INSERT ON tipe
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("tipe", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER update_tipe
        BEFORE UPDATE ON tipe
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("tipe", CURDATE(), CURTIME(), "Update", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER delete_tipe
        BEFORE DELETE ON tipe
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("tipe", CURDATE(), CURTIME(), "Delete", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER add_resep_obat
        BEFORE INSERT ON resep_obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("resep_obat", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER update_resep_obat
        BEFORE UPDATE ON resep_obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("resep_obat", CURDATE(), CURTIME(), "Update", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER delete_resep_obat
        BEFORE DELETE ON resep_obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("resep_obat", CURDATE(), CURTIME(), "Delete", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER add_pendaftaran
        BEFORE INSERT ON pendaftaran
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("pendaftaran", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER update_pendaftaran
        BEFORE UPDATE ON pendaftaran
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("pendaftaran", CURDATE(), CURTIME(), "Update", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER delete_pendaftaran
        BEFORE DELETE ON pendaftaran
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("pendaftaran", CURDATE(), CURTIME(), "Delete", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER add_dokter
        BEFORE INSERT ON dokter
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("dokter", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER update_dokter
        BEFORE UPDATE ON dokter
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("dokter", CURDATE(), CURTIME(), "Update", "Sukses");
        END
        ');
        DB::unprepared('
        CREATE TRIGGER delete_dokter
        BEFORE DELETE ON dokter
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("dokter", CURDATE(), CURTIME(), "Delete", "Sukses");
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER add_obat');
        DB::unprepared('DROP TRIGGER update_obat');
        DB::unprepared('DROP TRIGGER delete_obat');
        DB::unprepared('DROP TRIGGER add_masuk_obat');
        DB::unprepared('DROP TRIGGER update_masuk_obat');
        DB::unprepared('DROP TRIGGER delete_masuk_obat');
        DB::unprepared('DROP TRIGGER add_tipe');
        DB::unprepared('DROP TRIGGER update_tipe');
        DB::unprepared('DROP TRIGGER delete_tipe');
        DB::unprepared('DROP TRIGGER add_pendaftaran');
        DB::unprepared('DROP TRIGGER update_pendaftaran');
        DB::unprepared('DROP TRIGGER delete_pendaftaran');
        DB::unprepared('DROP TRIGGER add_masuk_obat');
        DB::unprepared('DROP TRIGGER update_masuk_obat');
        DB::unprepared('DROP TRIGGER delete_masuk_obat');
        DB::unprepared('DROP TRIGGER add_resep_obat');
        DB::unprepared('DROP TRIGGER update_resep_obat');
        DB::unprepared('DROP TRIGGER delete_resep_obat');
        DB::unprepared('DROP TRIGGER add_masuk_obat');
        DB::unprepared('DROP TRIGGER update_masuk_obat');
        DB::unprepared('DROP TRIGGER delete_masuk_obat');
    }
};
