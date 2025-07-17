@extends('table.data')


@section ('content_table')

<div id="folio-container" class="row">
    <h2>Data Barang</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Nama Barang</th>
          <th>Category</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Jumlah Stock</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($barang as $item)
        <tr>
          <td>{{ $item->barang_name }}</td>
          <td>{{ $item->barang_category }}</td>
          <td>{{ $item->barang_beli }}</td>
          <td>{{ $item->barang_jual }}</td>
          <td>{{ $item->barang_stock }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $barang->links() }}
    </div>

</div>
</div>


@endsection