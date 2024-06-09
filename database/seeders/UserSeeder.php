<?php

namespace Database\Seeders;

use App\Models\Borrower;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => "password",
            "role" => "admin",
        ]);

        User::create([
            "name" => "peminjam",
            "email" => "ego@gmail.com",
            "password" => "password",
            "role" => "peminjam",
        ]);

        // profile peminjam
        Borrower::create([
            'user_id' => 2,
            'name' => 'Ego',
            'phone_number' => '081234567890',
            'address' => 'Jl. Jalan No. 1',
            'birthdate' => '2000-01-01',
            'occupation' => 'Mahasiswa',
            'gender' => 'Laki-laki',
            "foto" => "2X6zq7YIlRdkEHXF1717175712.jpg",
        ]);
    }
}
