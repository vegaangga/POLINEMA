<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnggotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Anggota::insert([
            [
              'id'  			=> 1,
              'user_id'  		=> 1,
              'nisn'			=> 10000353,
              'nama' 			=> 'Muhammad Alif',
              'tempat_lahir'	=> 'Banjarmasin',
              'tgl_lahir'		=> '2000-01-01',
              'jk'				=> 'L',
              'jurusan'			=> 'TI',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 2,
              'user_id'  		=> 2,
              'npm'				=> 10000375,
              'nama' 			=> 'Nadia Layra',
              'tempat_lahir'	=> 'Banjarmasin',
              'tgl_lahir'		=> '2019-01-01',
              'jk'				=> 'P',
              'jurusan'			=> 'TI',
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
