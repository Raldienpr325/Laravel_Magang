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
                    <th>Jumlah Barang</th>
                    <th>Harga Total</th>
                    <th>Alamat</th>
                    <th>Kode Pos</th>
                    <th>action</th>
                </tr>
                @foreach ($dtcheckout as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama_user'] }}</td>
                        <td>{{ $item['nama_barang'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>Rp {{ number_format($item['biaya_total']) }}</td>
                        <td>Default Alamat</td>
                        <td>Default Kode Pos</td>
                        <td>
                            <a href="{{ url('delete-vote') }}"> <button class="btn btn-danger">delete</button></a>
                            <a href="{{ url('edit-vote') }}"> <button class="btn btn-warning">update</button></a>
                        </td>
                    </tr>

                @endforeach
            </table>
        </div>
        {{-- <div class="card-footer">{{ $dtcheckout->links() }}</div> --}}
    </div>
@endsection
