@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">

  <div class="card">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-pink hover-expand-effect">
          <div class="icon">
              <i class="material-icons">person</i>
          </div>
          <div class="content">
              <div class="text">USER</div>
              <div class="text">{{ $user }}</div>
              <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
          </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">group</i>
        </div>
        <div class="content">
            <div class="text">KELOMPOK MAGANG</div>
            <div class="text">{{ $internship_group }}</div>
            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-light-green hover-expand-effect">
        <div class="icon">
            <i class="material-icons">contact_mail</i>
        </div>
        <div class="content">
            <div class="text">SURAT PENGAJUAN</div>
            <div class="text">{{ $application_letter }}</div>
            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="material-icons">library_books</i>
        </div>
        <div class="content">
            <div class="text">LAPORAN</div>
            <div class="text">{{ $response_letter }}</div>
            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card">
      <div id="piechart"></div>
    </div>
    <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['USER', {{ $user }}],
  ['KELOMPOK MAGANG', {{ $internship_group }}],
  ['SURAT PENGAJUAN', {{ $application_letter }}],
  ['LAPORAN', {{ $response_letter }}]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Charts', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <div class="card-dashboard">
    <div class="body bg-pink">
      <ul class="dashboard-stat-list">
        <li>
            Admin
            <span class="pull-right"><b>{{ $admin }}</b> <small>DATA</small></span>
        </li>
        <li>
            Dosen
            <span class="pull-right"><b>{{ $dosen }}</b> <small>DATA</small></span>
        </li>
        <li>
            Mahasiswa
            <span class="pull-right"><b>{{ $mahasiswa }}</b> <small>DATA</small></span>
        </li>
    </ul>
    </div>
  </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <div class="card-dashboard">
    <div class="body bg-blue">
      <ul class="dashboard-stat-list">
        <li>
            Proposal
            <span class="pull-right"><b>{{ $proposal }}</b> <small>DATA</small></span>
        </li>
        <li>
            Surat Pengajuan
            <span class="pull-right"><b>{{ $application_letter }}</b> <small>DATA</small></span>
        </li>
        <li>
            Surat Balasan
            <span class="pull-right"><b>{{ $response_letter }}</b> <small>DATA</small></span>
        </li>
    </ul>
    </div>
  </div>
</div>
</div>
@endsection()