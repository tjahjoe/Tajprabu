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
                'kode' => 'pemilu-2024',
                'tag' => 'Pemilu 2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'pajak-digital',
                'tag' => 'Piala Dunia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'startup',
                'tag' => 'Startup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'AI',
                'tag' => 'AI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'covid-19',
                'tag' => 'Covid-19',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'k-pop',
                'tag' => 'K-Pop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'sepak-bola',
                'tag' => 'Sepak Bola',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'bencana-alam',
                'tag' => 'Bencana Alam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'kriminal',
                'tag' => 'Kriminal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'ekspor-impor',
                'tag' => 'Ekspor Impor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
