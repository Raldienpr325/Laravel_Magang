@extends('home')
@section('keranjang')

    <h2 class="text-center mt-3 mb-3"> Daftar checkout anda</h2>
    @foreach ($keranjang as $item)
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Nama Barang</th>
                <th>Hari checkout</th>
                <th>Estimasi Waktu</th>
                <th>Jumlah Barang</th>
                <th>Alamat</th>
                <th>Total Pembayaran</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_user }}</td>
                <td>{{ $item['nama_barang'] }}</td>
                <td>{{ $item['created_at'] }} </td>
                <td>{{ $item['waktu'] }} Hari</td>
                <td>{{ $item['jumlah'] }} Buah</td>
                <td>{{ $item['alamat'] }}</td>
                <td>Rp {{ number_format($item->biaya_total) }}</td>
                {{-- @if ()
                   td <button class="btn btn-sm btn-danger">Belum</button> td
                @endif  Kondisi lunas apa belum --}}
                <td><a href="{{ url('delete-keranjang', $item) }}">
                        <li class="fas fa-trash" style="color: red"></li>
                    </a>
                </td>
            </tr>
        </table>
    @endforeach
@endsection
