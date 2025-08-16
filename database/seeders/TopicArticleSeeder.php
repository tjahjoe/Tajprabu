<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('topic_article')->insert([
            [
                'id_article' => 1,
                'id_topic' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 2,
                'id_topic' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 3,
                'id_topic' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 4,
                'id_topic' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 5,
                'id_topic' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
