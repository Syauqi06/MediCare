<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'apoteker',
                'id_level' => '1',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'asdok',
                'id_level' => '2',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'resepsionis',
                'id_level' => '4',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'pasien',
                'id_level' => '3',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'superadmin',
                'id_level' => '5',
                'password' => Hash::make('123')
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Akun::create($val);
        }
    }
}
