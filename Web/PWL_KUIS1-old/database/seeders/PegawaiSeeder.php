<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'pegawai_name' => 'Vega',
                'pegawai_phone' => '085236676633',
                'pegawai_email' => '2041723013@polinema.ac.id',
                'pegawai_address' => 'Mojokerto',
                'pegawai_image' => '27.jpg',
                'pegawai_position' => 'Manager Project'
            ],
            [
                'pegawai_name' => 'Chika Labita',
                'pegawai_phone' => '085230956459',
                'pegawai_email' => '1941720018@polinema.ac.id',
                'pegawai_address' => 'Pasuruan',
                'pegawai_image' => '4.jpg',
                'pegawai_position' => 'HRD'
            ]

          ];

          DB::table('pegawai')->insert($data);
    }
}
