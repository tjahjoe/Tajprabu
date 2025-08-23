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
                'kode_topic' => 'politik',
                'topic' => 'Politik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_topic' => 'ekonomi',
                'topic' => 'Ekonomi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_topic' => 'olahraga',
                'topic' => 'Olahraga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_topic' => 'teknologi',
                'topic' => 'Teknologi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_topic' => 'kesehatan',
                'topic' => 'Kesehatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_topic' => 'hiburan',
                'topic' => 'Hiburan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_topic' => 'pendidikan',
                'topic' => 'Pendidikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_topic' => 'lingkungan',
                'topic' => 'Lingkungan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_topic' => 'internasional',
                'topic' => 'Internasional',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_topic' => 'hukum',
                'topic' => 'Hukum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
