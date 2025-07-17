<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function katalog(Request $request)
    {

        if($request->has('search')){ // Pemilihan jika ingin melakukan pencarian
            $posts= Buku::where('judul', 'like', "%".$request->search."%")
            ->orwhere('pengarang', 'like', "%".$request->search."%")
            ->orwhere('penerbit', 'like', "%".$request->search."%")
            ->orwhere('tahun_terbit', 'like', "%".$request->search."%")
            ->orwhere('isbn', "%".$request->search."%")
            ->orwhere('jumlah_buku', 'like', "%".$request->search."%")
            ->orwhere('lokasi', 'like', "%".$request->search."%")
            ->orwhere('tgl_input', 'like', "%".$request->search."%")
            ->paginate();
        } else { // Pemilihan jika tidak melakukan pencarian
            //fungsi eloquent menampilkan data menggunakan pagination
            $siswa= Buku::paginate(5); // Pagination menampilkan 5 data
        }
        return view('Siswa.katalog',compact('siswa'))->with('i',(request()->input('siswa',1)-1)*5);

    }

}
