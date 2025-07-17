<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'profile_title'=>'header',
                'profile_content'=>'Halaman ini berisi image...',
                'profile_image'=>'header-img-3.jpg'
            ]
            /*
            [
                'profile_title'=>'Design',
                'profile_content'=>'Gambar 1',
                'profile_image'=>'19.jpg'
            ],

            [
                'profile_title'=>'Design',
                'profile_content'=>'Gambar 2',
                'profile_image'=>'20.jpg'
            ],

            [
                'profile_title'=>'Design',
                'profile_content'=>'Gambar 3',
                'profile_image'=>'21.jpg'
            ],

            [
                'profile_title'=>'Design',
                'profile_content'=>'Gambar 4',
                'profile_image'=>'22.jpg'
            ],

            [
                'profile_title'=>'Design',
                'profile_content'=>'Gambar 5',
                'profile_image'=>'23.jpg'
            ],

            [
                'profile_title'=>'Web',
                'profile_content'=>'Gambar 6',
                'profile_image'=>'24.jpg'
            ],

            [
                'profile_title'=>'Web',
                'profile_content'=>'Gambar 7',
                'profile_image'=>'25.jpg'
            ],

            [
                'profile_title'=>'Web',
                'profile_content'=>'Gambar 8',
                'profile_image'=>'26.jpg'
            ],

            [
                'profile_title'=>'Web',
                'profile_content'=>'Gambar 9',
                'profile_image'=>'27.jpg'
            ],

            [
                'profile_title'=>'Web',
                'profile_content'=>'Gambar 10',
                'profile_image'=>'28.jpg'
            ],

            [
                'profile_title'=>'Branding',
                'profile_content'=>'Gambar 11',
                'profile_image'=>'29.jpg'
            ],

            [
                'profile_title'=>'Branding',
                'profile_content'=>'Gambar 12',
                'profile_image'=>'1.jpg'
            ],

            [
                'profile_title'=>'Branding',
                'profile_content'=>'Gambar 13',
                'profile_image'=>'2.jpg'
            ],

            [
                'profile_title'=>'Branding',
                'profile_content'=>'Gambar 14',
                'profile_image'=>'3.jpg'
            ],

            [
                'profile_title'=>'Branding',
                'profile_content'=>'Gambar 15',
                'profile_image'=>'4.jpg'
            ],

            [
                'profile_title'=>'Print',
                'profile_content'=>'Gambar 16',
                'profile_image'=>'5.jpg'
            ],

            [
                'profile_title'=>'Print',
                'profile_content'=>'Gambar 17',
                'profile_image'=>'6.jpg'
            ],

            [
                'profile_title'=>'Print',
                'profile_content'=>'Gambar 18',
                'profile_image'=>'7.jpg'
            ],

            [
                'profile_title'=>'Print',
                'profile_content'=>'Gambar 19',
                'profile_image'=>'8.jpg'
            ],

            [
                'profile_title'=>'Print',
                'profile_content'=>'Gambar 20',
                'profile_image'=>'9.jpg'
            ]
        */
        ];

        DB::table('profiles')->insert($data);
    }
}
