<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('article')->insert([
            [
                'id_user' => 2,
                'status_changed_by' => 1, 
                'date' => '2025-08-01',
                'article' => 'Pemerintah resmi mengumumkan jadwal Pemilu 2024 yang akan dilaksanakan serentak di seluruh Indonesia.',
                'status' => 'approved',
                'view' => 1200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3, 
                'status_changed_by' => 2, 
                'date' => '2025-08-05',
                'article' => 'Tim nasional berhasil meraih kemenangan pada laga persahabatan menjelang Piala Dunia 2026.',
                'status' => 'approved',
                'view' => 980,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3,
                'status_changed_by' => null,
                'date' => '2025-08-10',
                'article' => 'Perusahaan rintisan AI di Indonesia mendapat pendanaan seri B senilai 50 juta dolar AS.',
                'status' => 'pending',
                'view' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2, 
                'status_changed_by' => 1,
                'date' => '2025-08-12',
                'article' => 'Kementerian Kesehatan mengimbau masyarakat untuk tetap waspada terhadap penyebaran Covid-19 varian baru.',
                'status' => 'approved',
                'view' => 2100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3, 
                'status_changed_by' => 2, 
                'date' => '2025-08-14',
                'article' => 'Konser K-Pop terbesar di Asia Tenggara akan digelar di Jakarta tahun depan.',
                'status' => 'approved',
                'view' => 1560,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
