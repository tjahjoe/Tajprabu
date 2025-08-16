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
                'topic' => 'Politik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Ekonomi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Olahraga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Teknologi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Kesehatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Hiburan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Pendidikan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Lingkungan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Internasional',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Hukum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
