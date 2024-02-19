<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RekamMedisSeeder extends Seeder
{
    public function run()
    {
        DB::table('rekam_medis')->insert([
            'id_pasien' => 1,
            'id_dokter' => 1,
            'diagnosa' => 'Sample diagnosis',
            'tgl_pemeriksaan' => '2022-01-01',
        ]);
    }
}