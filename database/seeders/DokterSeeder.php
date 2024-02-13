<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DokterSeeder extends Seeder
{
    public function run()
    {
        DB::table('dokter')->insert([
            'id_poli' => 1,
            'nama_dokter' => 'Dr. Smith',
            'foto_dokter' => 'doctor.jpg',
            'no_telp' => '1234567890',
        ]);
    }
}