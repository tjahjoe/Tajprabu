<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tag')->insert([
            [
                'kode_tag' => 'pemilu-2024',
                'tag' => 'Pemilu 2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_tag' => 'pajak-digital',
                'tag' => 'Piala Dunia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_tag' => 'startup',
                'tag' => 'Startup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_tag' => 'AI',
                'tag' => 'AI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_tag' => 'covid-19',
                'tag' => 'Covid-19',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_tag' => 'k-pop',
                'tag' => 'K-Pop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_tag' => 'sepak-bola',
                'tag' => 'Sepak Bola',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_tag' => 'bencana-alam',
                'tag' => 'Bencana Alam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_tag' => 'kriminal',
                'tag' => 'Kriminal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_tag' => 'ekspor-impor',
                'tag' => 'Ekspor Impor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
