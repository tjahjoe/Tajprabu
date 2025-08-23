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
                'id_topic' => 1,
                'kode' => 'pemerintah-umumkan-jadwal-pemilu-2024' . time(),
                'title' => 'Pemerintah Umumkan Jadwal Pemilu 2024',
                'article' => 'Pemerintah resmi mengumumkan jadwal Pemilu 2024 yang akan dilaksanakan serentak di seluruh Indonesia.',
                'status' => 'approved',
                'view' => 1200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3, 
                'id_topic' => 2,
                'kode' => 'kebijakan-baru-pemerintah-terkait-pajak-digital' . time(),
                'title' => 'Kebijakan Baru Pemerintah Terkait Pajak Digital',
                'article' => 'Tim nasional berhasil meraih kemenangan pada laga persahabatan menjelang Piala Dunia 2026.',
                'status' => 'approved',
                'view' => 980,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3,
                'id_topic' => 3,
                'kode' => 'perusahaan-rintisan-ai-di-indonesia-mendapat-pendanaan-seri-b' . time(),
                'title' => 'Perusahaan Rintisan AI di Indonesia Mendapat Pendanaan Seri B',
                'article' => 'Perusahaan rintisan AI di Indonesia mendapat pendanaan seri B senilai 50 juta dolar AS.',
                'status' => 'pending',
                'view' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2, 
                'id_topic' => 4,
                'kode' => 'kementerian-kesehatan-imbau-waspada-covid-19-varian-baru' . time(),
                'title' => 'Kementerian Kesehatan Imbau Waspada Covid-19 Varian Baru',
                'article' => 'Kementerian Kesehatan mengimbau masyarakat untuk tetap waspada terhadap penyebaran Covid-19 varian baru.',
                'status' => 'approved',
                'view' => 2100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3, 
                'id_topic' => 5,
                'kode' => 'konser-k-pop-terbesar-di-asia-tenggara-akan-digelar-di-jakarta' . time(),
                'title' => 'Konser K-Pop Terbesar di Asia Tenggara Akan Digelar di Jakarta',
                'article' => 'Konser K-Pop terbesar di Asia Tenggara akan digelar di Jakarta tahun depan.',
                'status' => 'approved',
                'view' => 1560,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
