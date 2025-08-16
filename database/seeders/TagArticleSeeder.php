<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tag_article')->insert([
            [
                'id_article' => 1,
                'id_tag' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 1,
                'id_tag' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 2,
                'id_tag' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 3,
                'id_tag' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 4,
                'id_tag' => 5, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
