<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HomeSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(ContactSeeder::class);

        //Data
        $this->call(PegawaiSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(PelangganSeeder::class);
    }
}
