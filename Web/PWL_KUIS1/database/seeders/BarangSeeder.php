<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            /*
            [
                'barang_name' => 'Xiomi Poco X3 (8gb+12gb)',
                'barang_category' => 'SmartPhone',
                'barang_beli' => '3500000',
                'barang_jual' => '3750000',
                'barang_stock' => '25',
                'barang_image' => ''

            ],

            [
                'barang_name' => 'Xiomi Poco X3 (6gb+12gb)',
                'barang_category' => 'SmartPhone',
                'barang_beli' => '3100000',
                'barang_jual' => '3300000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Xiaomi Redmi 9 Smartphone [3GB/32GB]',
                'barang_category' => 'SmartPhone',
                'barang_beli' => '1800000',
                'barang_jual' => '1900000',
                'barang_stock' => '25',
                'barang_image' => ''

            ],
            [
                'barang_name' => 'Xiaomi Redmi 9A Smartphone Special Edition [2GB/ 32GB/ O]',
                'barang_category' => 'SmartPhone',
                'barang_beli' => '1199000',
                'barang_jual' => '1299000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Xiaomi Redmi Note 4 (MediaTek) (Silver, 64 GB)',
                'barang_category' => 'SmartPhone',
                'barang_beli' => '1099000',
                'barang_jual' => '1099900',
                'barang_stock' => '25',
                'barang_image' => ''

            ],
            [
                'barang_name' => 'Xiaomi Redmi Note 4X Smartphone [64GB/ 4GB]',
                'barang_category' => 'SmartPhone',
                'barang_beli' => ' 2550000',
                'barang_jual' => ' 2599000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            */
            [
                'barang_name' => 'Xiaomi Redmi Note 9 - Red [128 GB/6 GB]',
                'barang_category' => 'SmartPhone',
                'barang_beli' => '2450000',
                'barang_jual' => '2550000',
                'barang_stock' => '25',
                'barang_image' => ''
            ],
            [
                'barang_name' => 'Sepatu',
                'barang_category' => 'Sekolah',
                'barang_beli' => '200000',
                'barang_jual' => '250000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Tas',
                'barang_category' => 'Sekolah',
                'barang_beli' => '175000',
                'barang_jual' => '199000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Topi',
                'barang_category' => 'Sekolah',
                'barang_beli' => '20000',
                'barang_jual' => '25000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Kaos',
                'barang_category' => 'Sekolah',
                'barang_beli' => '88000',
                'barang_jual' => '95000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Celana',
                'barang_category' => 'Sekolah',
                'barang_beli' => '50000',
                'barang_jual' => '55000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Meja',
                'barang_category' => 'Mebel',
                'barang_beli' => '200000',
                'barang_jual' => '250000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Kursi',
                'barang_category' => 'Mebel',
                'barang_beli' => '350000',
                'barang_jual' => '450000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Lemari',
                'barang_category' => 'Mebel',
                'barang_beli' => '700000',
                'barang_jual' => '750000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ],
            [
                'barang_name' => 'Kemeja',
                'barang_category' => 'Sekolah',
                'barang_beli' => '100000',
                'barang_jual' => '110000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ]

          ];

          DB::table('barang')->insert($data);
    }
}
