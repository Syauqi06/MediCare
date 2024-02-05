<?php

namespace Database\Seeders;

use App\Models\Akun;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'resepsionis',
                'role' => 'resepsionis',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'apoteker',
                'role' => 'apoteker',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'pasien',
                'role' => 'pasien',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'asisten',
                'role' => 'asisten',
                'password' => Hash::make('123')
            ]
        ];

        // looping data dengan foreach
        foreach ($userData as $val) {
            Akun::create($val);
        }
    }
        
    }

