<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResepDokterSeeder extends Seeder
{
    public function run()
    {
        DB::table('resep_obat')->insert([
            'id_tipe' => 1,
            'id_rm' => 1,
            'id_dokter' => 1,
            'tgl_pembuatan_resep' => '2022-01-01',
            'status_pengambilan_obat' => 'berhasil',
        ]);
    }
}