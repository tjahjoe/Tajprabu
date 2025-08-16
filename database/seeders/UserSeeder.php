<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('user')->insert([
             [
                'id_role' => 1,
                'email' => 'super@example.com',
                'password' => 'supert123',
                'name' => 'Tamu Website',
                'address' => 'Jl. Melati No. 3',
                'phone_number' => '081234567892',
                'birth_date' => '2000-12-31',
                'gender' => 'man',
                'highest_education' => 'SMP',
                'photo_path' => 'photos/guest.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_role' => 2, 
                'email' => 'admin@example.com',
                'password' => 'admin123', 
                'name' => 'Admin Utama',
                'address' => 'Jl. Merdeka No. 1',
                'phone_number' => '081234567890',
                'birth_date' => '1990-01-01',
                'gender' => 'man',
                'highest_education' => 'S1 Teknik Informatika',
                'photo_path' => 'photos/admin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_role' => 3, 
                'email' => 'user@example.com',
                'password' => 'user123',
                'name' => 'Pengguna Biasa',
                'address' => 'Jl. Mawar No. 2',
                'phone_number' => '081234567891',
                'birth_date' => '1995-05-15',
                'gender' => 'woman',
                'highest_education' => 'SMA',
                'photo_path' => 'photos/user.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
