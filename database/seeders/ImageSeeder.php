<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('image')->insert([
            [
                'id_article' => 1,
                'path' => 'images/pemilu2024.jpg',
                'description' => 'Poster resmi Pemilu 2024.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 2,
                'path' => 'images/timnas-menang.jpg',
                'description' => 'Selebrasi gol timnas pada laga persahabatan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 3,
                'path' => 'images/startup-ai.jpg',
                'description' => 'Logo startup AI Indonesia yang mendapatkan pendanaan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 4,
                'path' => 'images/covid-varian-baru.jpg',
                'description' => 'Ilustrasi varian baru Covid-19.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 5,
                'path' => 'images/konser-kpop.jpg',
                'description' => 'Panggung konser K-Pop terbesar di Asia Tenggara.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
