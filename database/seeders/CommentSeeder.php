<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comment')->insert([
            [
                'id_article' => 1,
                'id_user' => 2,
                'id_parent' => null,
                'comment' => 'Artikel ini sangat menarik, banyak informasi baru yang saya dapat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 1,
                'id_user' => 3,
                'id_parent' => null,
                'comment' => 'Saya punya pendapat berbeda mengenai topik ini.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $parent1 = DB::table('comment')->where('comment', 'like', 'Artikel ini%')->value('id_comment');
        $parent2 = DB::table('comment')->where('comment', 'like', 'Saya punya%')->value('id_comment');

        DB::table('comment')->insert([
            [
                'id_article' => 1,
                'id_user' => 2,
                'id_parent' => $parent1,
                'comment' => 'Saya setuju dengan pendapat Anda.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_article' => 1,
                'id_user' => 3,
                'id_parent' => $parent2,
                'comment' => 'Boleh dijelaskan lebih detail alasannya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
