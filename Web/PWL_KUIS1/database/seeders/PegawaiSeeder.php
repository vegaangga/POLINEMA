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
                'pegawai_name' => 'Edith Maplesden',
                'pegawai_phone' => '5336821830',
                'pegawai_email' => 'emaplesden2@hatena.ne.jp',
                'pegawai_address' => '7579 Cascade Trail',
                'pegawai_image' => 'woman.png',
                'pegawai_position' => 'Programmer Analyst III'
            ],
            [
                'pegawai_name' => 'Benjamen Antonnikov',
                'pegawai_phone' => '668832535',
                'pegawai_email' => 'bantonnikov3@blogs.com',
                'pegawai_address' => '1620 Mifflin Place',
                'pegawai_image' => 'man.png',
                'pegawai_position' => 'Sales Representative'
            ],
            [
                'pegawai_name' => 'Sutton Stefi',
                'pegawai_phone' => '5336821830',
                'pegawai_email' => 'emaplesden2@hatena.ne.jp',
                'pegawai_address' => '7579 Cascade Trail',
                'pegawai_image' => 'woman.png',
                'pegawai_position' => 'Programmer Analyst III'
            ],
            [
                'pegawai_name' => 'Benjamen Antonnikov',
                'pegawai_phone' => '668832535',
                'pegawai_email' => 'bantonnikov3@blogs.com',
                'pegawai_address' => '1620 Mifflin Place',
                'pegawai_image' => 'man.png',
                'pegawai_position' => 'Sales Representative'
            ],
            [
                'pegawai_name' => 'Dugald Brereton',
                'pegawai_phone' => '5336821830',
                'pegawai_email' => 'emaplesden2@hatena.ne.jp',
                'pegawai_address' => '7579 Cascade Trail',
                'pegawai_image' => 'woman.png',
                'pegawai_position' => 'Programmer Analyst III'
            ],
            [
                'pegawai_name' => 'Rab Reaney',
                'pegawai_phone' => '668832535',
                'pegawai_email' => 'bantonnikov3@blogs.com',
                'pegawai_address' => '1620 Mifflin Place',
                'pegawai_image' => 'man.png',
                'pegawai_position' => 'Sales Representative'
            ],
            [
                'pegawai_name' => 'Arther Rosberg',
                'pegawai_phone' => '5336821830',
                'pegawai_email' => 'emaplesden2@hatena.ne.jp',
                'pegawai_address' => '7579 Cascade Trail',
                'pegawai_image' => 'woman.png',
                'pegawai_position' => 'Programmer Analyst III'
            ],
            [
                'pegawai_name' => 'Piper Kettridge',
                'pegawai_phone' => '7298623072',
                'pegawai_email' => 'pkettridge2l@pcworld.com',
                'pegawai_address' => '1620 Mifflin Place',
                'pegawai_image' => 'man.png',
                'pegawai_position' => 'Software Test Engineer I'
            ],
            [
                'pegawai_name' => 'Nicoline Tomaello',
                'pegawai_phone' => '4688594355',
                'pegawai_email' => 'ntomaello2m@lulu.com',
                'pegawai_address' => '7579 Cascade Trail',
                'pegawai_image' => 'woman.png',
                'pegawai_position' => 'Safety Technician II'
            ],
            [
                'pegawai_name' => 'Honoria Rouzet',
                'pegawai_phone' => '201648768',
                'pegawai_email' => 'hrouzet2n@house.gov',
                'pegawai_address' => '1620 Mifflin Place',
                'pegawai_image' => 'man.png',
                'pegawai_position' => 'Sales Representative'
            ],
            [
                'pegawai_name' => 'Dorree Wardrope',
                'pegawai_phone' => '5336821830',
                'pegawai_email' => 'emaplesden2@hatena.ne.jp',
                'pegawai_address' => '7579 Cascade Trail',
                'pegawai_image' => 'woman.png',
                'pegawai_position' => 'Programmer Analyst III'
            ],
            [
                'pegawai_name' => 'Augie Guerro',
                'pegawai_phone' => '8998587996',
                'pegawai_email' => 'aguerro2p@4shared.com',
                'pegawai_address' => '06 Beilfuss Junction',
                'pegawai_image' => 'man.png',
                'pegawai_position' => 'Account Representative III'
            ],
            [
                'pegawai_name' => 'Timothy Haet',
                'pegawai_phone' => '8455975466',
                'pegawai_email' => 'thaet2q@flavors.me',
                'pegawai_address' => '0 David Alley',
                'pegawai_image' => 'man.png',
                'pegawai_position' => 'Network Specialist'
            ],
            [
                'pegawai_name' => 'Gwendolin Celand',
                'pegawai_phone' => '1752292670',
                'pegawai_email' => 'gceland2r@gov.uk',
                'pegawai_address' => '098 Harper Avenue',
                'pegawai_image' => 'man.png',
                'pegawai_position' => 'Director of Sales'
            ]

          ];

          DB::table('pegawai')->insert($data);
    }
}
