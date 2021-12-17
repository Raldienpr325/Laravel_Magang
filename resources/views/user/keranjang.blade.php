@extends('home')
@section('keranjang')

    <h2 class="text-center mt-3 mb-3"> Daftar checkout anda</h2>
    @foreach ($keranjang as $item)
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Estimasi Waktu</th>
                <th>Jumlah Barang</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>Total Pembayaran</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['nama_barang'] }}</td>
                <td>
                    {{ $item['waktu'] }} Hari</td>
                <td>{{ $item['jumlah'] }} Buah</td>
                <td>Jl Nogosari kavling 20 Malang</td>
                <td>123123</td>
                <td>Rp {{ number_format($item->biaya_total) }}</td>
                <td><a href="#"> <button class="btn btn-danger">delete</button></a>
                    <a href="#"> <button class="btn btn-warning">update</button></a>
                </td>
            </tr>
        </table>
    @endforeach
@endsection
