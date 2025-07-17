<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table= 'barang';
    protected $primaryKey='kode_barang';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id_barang',
        'kode_barang',
        'nama_barang',
        'kategori_barang',
        'harga',
        'qty',
       ];
}
