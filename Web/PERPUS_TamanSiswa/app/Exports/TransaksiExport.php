<?php

namespace App\Exports;

use App\Models\Transaksi as ModelsTransaksi;
use App\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsTransaksi::all();
    }
}
