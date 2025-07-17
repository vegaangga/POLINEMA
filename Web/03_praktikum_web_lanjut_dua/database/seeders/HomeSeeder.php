<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
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
            'home_title' => 'Header Home',
            'home_content' => 'buat header home',
            'home_image' => 'header-img.jpg'
        ],
        [
            'home_title' => 'Welcome to Home',
            'home_content' => 'Multi Profile is free responsive website template for everyone. Feel free to download and use this template for your websites. Thank you for visiting templatemo.',
            'home_image' => ''
        ],
        [
            'home_title' => 'Ini adalah Slider',
            'home_content' => 'Kelompok Multiple Profile',
            'home_image' => ''
        ],
        [
            'home_title' => 'WHO WE ARE',
            'home_content' => 'VEGA ANGGARESTA - TI 2C - 24 - 20141723013',
            'home_image' => ''
        ]

      ];

      DB::table('homes')->insert($data);
    }
}
