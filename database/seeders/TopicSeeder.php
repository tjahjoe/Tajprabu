<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('topic')->insert([
            [
                'kode' => 'politik',
                'topic' => 'Politik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'ekonomi',
                'topic' => 'Ekonomi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'olahraga',
                'topic' => 'Olahraga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'teknologi',
                'topic' => 'Teknologi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'kesehatan',
                'topic' => 'Kesehatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'hiburan',
                'topic' => 'Hiburan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'pendidikan',
                'topic' => 'Pendidikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'lingkungan',
                'topic' => 'Lingkungan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'internasional',
                'topic' => 'Internasional',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'hukum',
                'topic' => 'Hukum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
