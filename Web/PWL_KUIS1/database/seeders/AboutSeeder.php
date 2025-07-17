<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
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
                'about_title' => 'ABOUT US',
                'about_content' => 'Kelompok Multi Porfile -> Vega Anggaresta & Chika Labita',
                'about_image' => 'header-img-2.jpg'
            ],
            [
                'about_title' => 'Who We are',
                'about_content' => 'Multi-Profile',
                'about_image' => ''
            ],
            [
                'about_title' => 'Morbi Accumsan',
                'about_content' => 'Morbi dapibus rhoncus nulla ac tempus. Integer felis lorem, fermentum quis nisl accumsan, gravida gravida est. Cras ultrices rhoncus dui ut laoreet. Fusce tincidunt, urna a imperdiet tempor, orci dolor dictum elit, sit amet malesuada mauris magna eget dolor.',
                'about_image' => ''
            ],
            [
                'about_title' => 'SECTION',
                'about_content' => 'VEGA ANGGARESTA - TI 2C - 24 - 20141723013',
                'about_image' => ''
            ]

          ];

          DB::table('abouts')->insert($data);
        }
}
