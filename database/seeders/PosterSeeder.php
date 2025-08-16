<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('poster')->insert([
            [
                'id_user' => 1, 
                'path' => 'posters/event_1.jpg',
                'status' => 'approved',
                'date' => '2025-08-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 1, 
                'path' => 'posters/event_2.jpg',
                'status' => 'pending',
                'date' => '2025-08-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 1,
                'path' => 'posters/event_3.jpg',
                'status' => 'rejected',
                'date' => '2025-09-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 1,
                'path' => 'posters/event_4.jpg',
                'status' => 'approved',
                'date' => '2025-09-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 1,
                'path' => 'posters/event_5.jpg',
                'status' => 'pending',
                'date' => '2025-09-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
