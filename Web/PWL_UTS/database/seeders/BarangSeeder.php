<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

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
                'id_barang' => '1',
                'kode_barang' => 'PRD001',
                'nama_barang' => 'Indomie',
                'kategori_barang' => 'Makanan',
                'harga' => '3000',
                'qty' => '100'
            ],
            [
                'id_barang' => '2',
                'kode_barang' => 'PRD002',
                'nama_barang' => 'Pocari Sweat',
                'kategori_barang' => 'Minuman',
                'harga' => '6000',
                'qty' => '50'
            ],
            [
                'id_barang' => '3',
                'kode_barang' => 'PRD003',
                'nama_barang' => 'Silverqueen',
                'kategori_barang' => 'Snack',
                'harga' => '12500',
                'qty' => '45'
            ],
            [
                'id_barang' => '4',
                'kode_barang' => 'PRD004',
                'nama_barang' => 'Masako Ayam',
                'kategori_barang' => 'Bahan Dapur',
                'harga' => '500',
                'qty' => '1000'
            ],
            [
                'id_barang' => '5',
                'kode_barang' => 'PRD005',
                'nama_barang' => 'Masako Sapi',
                'kategori_barang' => 'Bahan Dapur',
                'harga' => '650',
                'qty' => '1000'
            ],
            [
                'id_barang' => '6',
                'kode_barang' => 'PRD006',
                'nama_barang' => 'Fanta',
                'kategori_barang' => 'Minuman',
                'harga' => '5000',
                'qty' => '250'
            ],
            [
                'id_barang' => '7',
                'kode_barang' => 'PRD007',
                'nama_barang' => 'Coca-Cola',
                'kategori_barang' => 'Minuman',
                'harga' => '5000',
                'qty' => '200'
            ],
            [
                'id_barang' => '8',
                'kode_barang' => 'PRD008',
                'nama_barang' => 'Sprite',
                'kategori_barang' => 'Minuman',
                'harga' => '5000',
                'qty' => '150'
            ],
            [
                'id_barang' => '9',
                'kode_barang' => 'PRD009',
                'nama_barang' => 'Teh Pucuk Harum',
                'kategori_barang' => 'Minuman',
                'harga' => '3000',
                'qty' => '100'
            ],
            [
                'id_barang' => '10',
                'kode_barang' => 'PRD010',
                'nama_barang' => 'Teh Kotak',
                'kategori_barang' => 'Minuman',
                'harga' => '4000',
                'qty' => '240'
            ],
            [
                'id_barang' => '11',
                'kode_barang' => 'PRD011',
                'nama_barang' => 'Oramin-C',
                'kategori_barang' => 'Minuman',
                'harga' => '4500',
                'qty' => '200'
            ],
            [
                'id_barang' => '12',
                'kode_barang' => 'PRD012',
                'nama_barang' => 'Mie Sedap',
                'kategori_barang' => 'Makanan',
                'harga' => '2800',
                'qty' => '50'
            ],
            [
                'id_barang' => '13',
                'kode_barang' => 'PRD013',
                'nama_barang' => 'Samyang',
                'kategori_barang' => 'Makanan',
                'harga' => '18000',
                'qty' => '20'
            ],
            [
                'id_barang' => '14',
                'kode_barang' => 'PRD014',
                'nama_barang' => 'Cadbury dairy milk',
                'kategori_barang' => 'Snack',
                'harga' => '13000',
                'qty' => '30'
            ],
            [
                'id_barang' => '15',
                'kode_barang' => 'PRD015',
                'nama_barang' => 'Taro',
                'kategori_barang' => 'Snack',
                'harga' => '3000',
                'qty' => '20'
            ],
            [
                'id_barang' => '16',
                'kode_barang' => 'PRD016',
                'nama_barang' => 'Lays Rumput Laut',
                'kategori_barang' => 'Snack',
                'harga' => '25000',
                'qty' => '25'
            ],
            [
                'id_barang' => '17',
                'kode_barang' => 'PRD017',
                'nama_barang' => 'Oreo',
                'kategori_barang' => 'Snack',
                'harga' => '5000',
                'qty' => '50'
            ],
            [
                'id_barang' => '18',
                'kode_barang' => 'PRD018',
                'nama_barang' => 'Richeese Pasta Keju',
                'kategori_barang' => 'Snack',
                'harga' => '12000',
                'qty' => '10'
            ],
            [
                'id_barang' => '19',
                'kode_barang' => 'PRD019',
                'nama_barang' => 'Chitato',
                'kategori_barang' => 'Snack',
                'harga' => '6500',
                'qty' => '50'
            ],
            [
                'id_barang' => '20',
                'kode_barang' => 'PRD020',
                'nama_barang' => 'Kinder Joy',
                'kategori_barang' => 'Snack',
                'harga' => '13000',
                'qty' => '50'
            ]
          ];

          DB::table('barang')->insert($data);

    }


}
