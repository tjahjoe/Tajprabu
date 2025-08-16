<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('like')->insert([
            [
                'id_article' => 1,
                'id_user' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 1,
                'id_user' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 2,
                'id_user' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
