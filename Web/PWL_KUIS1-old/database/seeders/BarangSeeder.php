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
            [
                'barang_name' => 'Kipas',
                'barang_category' => 'Elektronik',
                'barang_beli' => '500000',
                'barang_jual' => '550000',
                'barang_stock' => '25',
                'barang_image' => '27.jpg'

            ],
            [
                'barang_name' => 'Lemari',
                'barang_category' => 'Perabotan',
                'barang_beli' => '750000',
                'barang_jual' => '1000000',
                'barang_stock' => '10',
                'barang_image' => '27.jpg'
            ]

          ];

          DB::table('barang')->insert($data);
    }
}
