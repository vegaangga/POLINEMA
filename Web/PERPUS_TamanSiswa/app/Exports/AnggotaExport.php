<?php

namespace App\Exports;

use App\Anggota;
use App\Models\Anggota as ModelsAnggota;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnggotaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsAnggota::all();
    }
}
