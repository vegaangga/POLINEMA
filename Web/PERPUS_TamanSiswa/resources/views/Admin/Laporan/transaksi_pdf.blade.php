<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
       #table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#normal{
  border: 0 solid #dddddd;
  text-align: left;
  padding: 0;
}

#isi-table {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>
  <link rel="stylesheet" href="">
	<title>Laporan Data Transaksi</title>
</head>
<body>
  <table style="width: 100%">
    <tr>
      {{-- <td><img src=" {{ asset('images/logo-smk.png') }}" style="width: 150px"></td> --}}
      <td>
        <center>
          <font size="4">PERPUSTAKAAN</font><br>
          <font size="5"><b>SMK TAMAN SISWA MOJOAGUNNG </b></font><br>
          <font size="2"></font><br>
          <font size="2"><i>Jln Cut Nya'Dien No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Tempurejo Jember Jawa Timur</i></font>
        </center>
      </td>
    </tr>
    <tr>
      <td colspan="2"><hr></td>
    </tr>
  </table>
 <table id="table">
  <thead>
    <tr>
      <th colspan="7">Laporan Data Peminjaman</th>
      <th></th>
    </tr>
    <tr>
      <th id="isi-table">Kode</th>
      <th id="isi-table">Buku</th>
      <th id="isi-table">Peminjam</th>
      <th id="isi-table">Tgl Pinjam</th>
      <th id="isi-table">Tgl Kembali</th>
      <th id="isi-table">Status </th>
      <th id="isi-table">Denda </th>
    </tr>
  </thead>
  <tbody>
    @foreach($datas as $data)
    <tr>
      <td id="isi-table">
      {{$data->kode_transaksi}}
      </td>
      <td id="isi-table">{{$data->buku->judul}}</td>
      <td id="isi-table"> {{$data->anggota->nama}}</td>
      <td id="isi-table">{{date('d/m/y', strtotime($data->tgl_pinjam))}}</td>
      <td id="isi-table"> {{date('d/m/y', strtotime($data->tgl_kembali))}}</td>
      <td id="isi-table">
          @if($data->status == 'pinjam')
            <label class="badge badge-warning">Pinjam</label>
          @else
            <label class="badge badge-success">Kembali</label>
          @endif
      </td>
      <td id="isi-table">
        <?php
            $datetime2 = strtotime($data->tgl_kembali) ;
            $datenow = strtotime(date("Y-m-d"));
            $durasi = ($datetime2 - $datenow) / 86400 ;
        ?>
        @if($data->status == 'pinjam')
            @if ($durasi < 0)
            <?php $denda = abs($durasi) * 1000 ; ?>
            {{ $denda }}
            @else
                0
            @endif
        @else
        0
        @endif
    </td>
     </tr>
    @endforeach
  </tbody>
 </table>
</body>
</html>
