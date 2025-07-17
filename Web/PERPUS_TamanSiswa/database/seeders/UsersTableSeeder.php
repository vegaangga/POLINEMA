<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            [
              'id'  			=> 1,
              'name'  			=> 'Adi Lukman',
              'username'		=> 'super123',
              'email' 			=> 'super123@gmail.com',
              'password'		=> bcrypt('super123'),
              'gambar'			=> NULL,
              'level'			=> 'super_admin',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'  			=> 2,
                'name'  		=> 'Shawn Mendes',
                'username'		=> 'admin123',
                'email' 		=> 'admin123@gmail.com',
                'password'		=> bcrypt('admin123'),
                'gambar'		=> NULL,
                'level'			=> 'admin',
                'remember_token'=> NULL,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now()
              ],
            [
              'id'  			=> 3,
              'name'  			=> 'Aisyah Ramadhani',
              'username'		=> 'user123',
              'email' 			=> 'user123@gmail.com',
              'password'		=> bcrypt('user123'),
              'gambar'			=> NULL,
              'level'			=> 'user',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
