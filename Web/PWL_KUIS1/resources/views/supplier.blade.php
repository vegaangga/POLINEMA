@extends('table.data')

@section ('content_table')

<div id="folio-container" class="row">
    <h2 id="data">Data Supplier</h2>
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($supplier as $index => $item)
        <tr>
            <td>{{ $index + $supplier->firstItem() }}</td>
          <td>{{ $item->supplier_name }}</td>
          <td>{{ $item->supplier_phone }}</td>
          <td>{{ $item->supplier_email }}</td>
          <td>{{ $item->supplier_address }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $supplier->links() }}
    </div>

</div>
</div>


@endsection