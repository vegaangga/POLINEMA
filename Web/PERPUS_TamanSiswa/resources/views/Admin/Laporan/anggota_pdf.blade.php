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

/* tr:nth-child(even) {
  background-color: #dddddd;
} */
	</style>
  <link rel="stylesheet" href="">
	<title>Laporan Data Anggota</title>
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
        <th colspan="7">Laporan Data Anggota</th>
        <th> </th>
      </tr>
      <tr>
        <th id="isi-table">NISN</th>
        <th id="isi-table">Nama</th>
        <th id="isi-table">Jurusan</th>
        <th id="isi-table">Jenis Kelamin</th>
        <th id="isi-table">Tempat Lahir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <td id="isi-table"> {{$data->nisn}} </td>
        <td id="isi-table"> {{$data->nama}}</td>
        <td id="isi-table">
          @if($data->jurusan == 'TI')
            Teknik Informatika
          @elseif($data->jurusan == 'SI')
            Sistem Informasi
          @else
            Kesehatan Masyarakat
          @endif
        </td>
        <td id="isi-table">{{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}</td>
        <td id="isi-table">{{$data->tempat_lahir}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</body>
</html>
