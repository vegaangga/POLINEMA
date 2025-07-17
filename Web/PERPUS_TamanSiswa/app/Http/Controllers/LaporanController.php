<?php

namespace App\Http\Controllers;

use App\Exports\AnggotaExport;
use App\Exports\BukuExport;
use App\Exports\TransaksiExport;
use App\Exports\UserExport;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;

class LaporanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bukuPdf()
    {

        $datas = Buku::all();
        $pdf = PDF::loadView('Admin.Laporan.buku_pdf', compact('datas'));
         return $pdf->download('Admin.Laporan.buku_pdf'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function bukuExcel(Request $request)
    {

     return Excel::download(new BukuExport, 'buku.xlsx');

    }

    public function anggotaPdf()
    {

        $datas = Anggota::all();
        $pdf = PDF::loadView('Admin.Laporan.anggota_pdf', compact('datas'));
        return $pdf->download('Admin.Laporan.anggota_pdf'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function anggotaExcel(Request $request)
    {
    return Excel::download(new AnggotaExport, 'anggota.xlsx');
    }

    public function transaksiPdf(Request $request)
    {
        $q = Transaksi::query();

        if($request->get('status'))
        {
             if($request->get('status') == 'pinjam') {
                $q->where('status', 'pinjam');
            } else {
                $q->where('status', 'kembali');
            }
        }

        if(Auth::user()->level == 'user')
        {
            $q->where('anggota_id', Auth::user()->anggota->id);
        }

        $datas = $q->get();

        $datas = Transaksi::all();
        $pdf = PDF::loadView('Admin.Laporan.transaksi_pdf', compact('datas'));
        return $pdf->download('Admin.Laporan.transaksi_pdf'.date('Y-m-d_H-i-s').'.pdf');
    }


    public function transaksiExcel(Request $request)
    {
    return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    }

    public function userPdf()
    {
        $datas = User::all();
        $pdf = PDF::loadView('Admin.Laporan.user_pdf', compact('datas'));
        return $pdf->download('Admin.Laporan.user_pdf'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function userExcel(Request $request)
    {
    return Excel::download(new UserExport, 'user.xlsx');
    }
}
