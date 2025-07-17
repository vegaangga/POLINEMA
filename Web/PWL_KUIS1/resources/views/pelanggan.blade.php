@extends('table.data')

@section ('content_table')

<div id="folio-container" class="row">
    <h2 id="data">Data Pelanggan</h2>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>

          @foreach ($pelanggan as $index => $item)
        <tr>
          <td>{{ $index + $pelanggan->firstItem() }}</td>
          <td>{{ $item->pelanggan_name }}</td>
          <td>{{ $item->pelanggan_phone }}</td>
          <td>{{ $item->pelanggan_email }}</td>
          <td>{{ $item->pelanggan_address }}</td>
          <td><img src="../../img/{{ $item->pelanggan_image}}" style="width: 75px;"></td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $pelanggan->links() }}
    </div>

</div>
</div>


@endsection