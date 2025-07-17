<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_supplier = [
            [
                'supplier_name'=>'Venisya Aurora Putri',
                'supplier_phone'=>'(0240)-00115888',
                'supplier_email'=>'VPutriA@gmail.com',
                'supplier_address'=>'Jln. A. Yani, Surakarta'
            ],
        
            [
                'supplier_name'=>'Ricky Ha',
                'supplier_phone'=>'(0348)-88445140',
                'supplier_email'=>'RrickyHaa@gmail.com',
                'supplier_address'=>'Jln. Semanggi, Pasuruan'
            ],

            [
                'supplier_name'=>'Gerry',
                'supplier_phone'=>'(0345)-55444532',
                'supplier_email'=>'Gerry_01@gmail.com',
                'supplier_address'=>'Jln. Anggrek Kencana, Bekasi'
            ],

            [
                'supplier_name'=>'Dessy Ratna',
                'supplier_phone'=>'(0343)-90453250',
                'supplier_email'=>'DesyYa@gmail.com',
                'supplier_address'=>'Jln. Setia Budi, Yogyakarta'
            ],

            [
                'supplier_name'=>'Yanti Safitri',
                'supplier_phone'=>'(0245)-55821421',
                'supplier_email'=>'Yanty@gmail.com',
                'supplier_address'=>'Jln. Diponegoro, Surabaya'
            ],

            [
                'supplier_name'=>'Cherly',
                'supplier_phone'=>'(0345)-55800020',
                'supplier_email'=>'Cherly@gmail.com',
                'supplier_address'=>'Jln. Bunga Cokelat, Jakarta Utara'
            ],

            [
                'supplier_name'=>'M. Sholeh',
                'supplier_phone'=>'(0343)-90157896',
                'supplier_email'=>'Sholeh@gmail.com',
                'supplier_address'=>'Jln. Anggrek, Surakarta'
            ],

            [
                'supplier_name'=>'Dwiyana',
                'supplier_phone'=>'(02930-88731400)',
                'supplier_email'=>'Dwi_y@gmail.com',
                'supplier_address'=>'Jln. Bumi Indah, Wonorejo'
            ],

            [
                'supplier_name'=>'Very',
                'supplier_phone'=>'(0343)-00159941',
                'supplier_email'=>'Firmanadri@gmail.com',
                'supplier_address'=>'Jln. Pangeran Antasari, Jakarta Selatan'
            ],

            [
                'supplier_name'=>'Andikha Sofyan',
                'supplier_phone'=>'(0343)-77441580',
                'supplier_email'=>'Andi_7@gmail.com',
                'supplier_address'=>'Jln. Soekarna-Hatta, Semarang'
            ]

        ];

        DB::table('supplier')->insert($data_supplier);
    }
}
