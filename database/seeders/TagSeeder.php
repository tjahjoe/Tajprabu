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
                'tag' => 'Pemilu 2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'Piala Dunia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'Startup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'AI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'Covid-19',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'K-Pop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'Sepak Bola',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'Bencana Alam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'Kriminal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'Ekspor Impor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
