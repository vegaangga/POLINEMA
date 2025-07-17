@extends('table.data')

@section ('content_table')

<div id="folio-container" class="row">
    <h2 id="data">Data Pegawai</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
          <th>Picture</th>
          <th>Position</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($pegawai as $item)
        <tr>
          <td>{{ $item->pegawai_name }}</td>
          <td>{{ $item->pegawai_phone }}</td>
          <td>{{ $item->pegawai_email }}</td>
          <td>{{ $item->pegawai_address }}</td>
          <td><img src="../../img/{{ $item->pegawai_image}}" style="width: 75px;"></td>
          <td>{{ $item->pegawai_position }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $pegawai->links() }}
    </div>

</div>
</div>


@endsection