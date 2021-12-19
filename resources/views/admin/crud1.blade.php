@extends('home')
@section('crud1')
    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <a href="{{ url('create-vote') }}" class="btn btn-success">add data</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No </th>
                    <th>Nama Barang</th>
                    <th>Foto</th>
                    <th>Stok</th>
                    <th>Harga Satuan</th>
                    <th>action</th>
                </tr>
                @foreach ($dtlayanan as $item)
                    <tr>
                        <td>{{ $loop->iteration }} </td>
                        <td>{{ $item->namabarang }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $item->foto) }}" width="200" height="200">
                        </td>
                        <td>{{ $item->stok }}</td>
                        <td>Rp {{ number_format($item->harga) }}</td>
                        <td>
                            <a href="{{ url('delete-layanan', $item->id) }}"> <button
                                    class="btn btn-danger">delete</button></a>
                            <a href="{{ url('edit-layanan', $item->id) }}"> <button
                                    class="btn btn-warning">update</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">{{ $dtlayanan->links() }}</div>
    </div>
@endsection
