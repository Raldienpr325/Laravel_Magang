@extends('home')
@section('crud1')
    <div class="content">
        <div class="card-body">
            <a href="{{ url('create-vote') }}" class="btn btn-success mb-3 ">add data</a>
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
                            <a href="{{ url('delete-layanan', $item->id) }}"> <button class="fas fa-trash border-0"
                                    style="color: red"></button></a>
                            <a href="{{ url('edit-layanan', $item->id) }}"> <button class="fas fa-pen border-0"
                                    style="color: green"></button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">{{ $dtlayanan->links() }}</div>
    </div>
@endsection
