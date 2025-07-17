<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_pelanggan = [
            [
                'pelanggan_name'=>'Farissah Yustika',
                'pelanggan_phone'=>'085289012697',
                'pelanggan_email'=>'RissaYustika@gmail.com',
                'pelanggan_address'=>'Jln. Mawar Bless, Surabaya',
                'pelanggan_image'=>'1.jpg'
            ],

            [
                'pelanggan_name'=>'Moch. Andi',
                'pelanggan_phone'=>'082297006069',
                'pelanggan_email'=>'Andiwkwk@gmail.com',
                'pelanggan_address'=>'Jln. Kamboeja, Surakarta',
                'pelanggan_image'=>'2.jpg'
            ],

            [
                'pelanggan_name'=>'Muhammad Verdynan',
                'pelanggan_phone'=>'081254700478',
                'pelanggan_email'=>'Verdynan00@gmail.com',
                'pelanggan_address'=>'Jln. Daegu, Jakarta Barat',
                'pelanggan_image'=>'3.jpg'
            ],

            [
                'pelanggan_name'=>'Rezaldi Rahardyan',
                'pelanggan_phone'=>'081704210035',
                'pelanggan_email'=>'RahadyanReza@gmail.com',
                'pelanggan_address'=>'Jln. Jatinegara, Jakarta Utara',
                'pelanggan_image'=>'4.jpg'
            ],
          
            [
                'pelanggan_name'=>'Axel Imanuel',
                'pelanggan_phone'=>'082212505441',
                'pelanggan_email'=>'Axelnuel@gmail.com',
                'pelanggan_address'=>'Jln. Diponegoro, Solo',
                'pelanggan_image'=>'5.jpg'
            ],

            [
                'pelanggan_name'=>'Veronica',
                'pelanggan_phone'=>'081227880223',
                'pelanggan_email'=>'ica_00@gmail.com',
                'pelanggan_address'=>'Jln. Karanganyar, Surakarta',
                'pelanggan_image'=>'6.jpg'
            ],

            [
                'pelanggan_name'=>'Muhammad Arif',
                'pelanggan_phone'=>'089946445211',
                'pelanggan_email'=>'Mariff_1@gmail.com',
                'pelanggan_address'=>'Jln. Blimbing, Surabaya',
                'pelanggan_image'=>'7.jpg'
            ],

            [
                'pelanggan_name'=>'Moch. Alvin Syarifuddin',
                'pelanggan_phone'=>'087454104322',
                'pelanggan_email'=>'Alvinuddin@gmail.com',
                'pelanggan_address'=>'Jln. Soekarno-Hatta, Depok',
                'pelanggan_image'=>'8.jpg'
            ],

            [
                'pelanggan_name'=>'Qomar',
                'pelanggan_phone'=>'085775022114',
                'pelanggan_email'=>'Qomarr02@gmail.com',
                'pelanggan_address'=>'Jln. RA. Kartini, Bali',
                'pelanggan_image'=>'9.jpg'
            ],
            
            [
                'pelanggan_name'=>'Sony',
                'pelanggan_phone'=>'087880054707',
                'pelanggan_email'=>'Sony_p@gmail.com',
                'pelanggan_address'=>'Jln. Klaten, Lamongan',
                'pelanggan_image'=>'10.jpg'
            ]



        ];

        DB::table('pelanggan')->insert($data_pelanggan);
    }
}
