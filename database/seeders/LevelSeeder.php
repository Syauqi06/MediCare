<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dummy data for levels
        $data = [
            ['nama_level' => 'Admin'],
            ['nama_level' => 'User'],
            // Add more dummy data as needed
        ];

        // Insert data into the 'level' table
        Level::insert($data);
    }
}
