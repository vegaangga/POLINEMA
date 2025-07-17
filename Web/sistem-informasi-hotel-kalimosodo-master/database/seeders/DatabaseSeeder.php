<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $fasilitas = [
            ['name'  => 'AC', 'is_active' => 1],
            ['name'  => 'Televisi', 'is_active' => 1],
            ['name'  => 'Shower', 'is_active' => 1],
            ['name'  => 'Kamar Mandi Pribadi', 'is_active' => 1],
            ['name'  => 'Free Wifi', 'is_active' => 1],
            ['name'  => 'Hair Dryer', 'is_active' => 1],
            ['name'  => 'Brankas dalam kamar', 'is_active' => 1],
            ['name'  => 'Bathub', 'is_active' => 1],
        ];
        DB::table('facility')->insert($fasilitas);

        User::create([
            'name' => 'Administrator',
            'address' => 'Malang',
            'phone' => '08512345678',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => Hash::make('admin1234')
        ]);
    }
}