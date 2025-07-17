<?php

namespace App\Exports;

use App\Buku;
use App\Models\Buku as ModelsBuku;
use Maatwebsite\Excel\Concerns\FromCollection;

class BukuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsBuku::all();
    }
}
