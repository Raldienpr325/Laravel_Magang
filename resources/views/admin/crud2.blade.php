@extends('home')
@section('crud1')

    <div class="content">
        <div class="card card-info card-outline">
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No </th>
                    <th>Nama Pelanggan</th>
                    <th>Barang Yang dipilih</th>
                    <th>Stok</th>
                    <th>Harga Total</th>
                    <th>action</th>
                </tr>
                {{-- @foreach ($dtvote as $item) --}}
                <tr>
                    <td>1</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        <a href="{{ url('delete-vote') }}"> <button class="btn btn-danger">delete</button></a>
                        <a href="{{ url('edit-vote') }}"> <button class="btn btn-warning">update</button></a>
                    </td>
                </tr>
                {{-- @endforeach --}}
            </table>
        </div>
        {{-- <div class="card-footer">{{ $dtvote->links() }}</div> --}}
    </div>
@endsection
