@extends('home')
@section('checkout')
    <div class="content">
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                Berhasil Checkout !
            </div>
            <a href="{{ url('keranjang') }}">
                <p><button class="btn btn-sm btn-success"><i class="fas fa-shopping-cart" aria-hidden="true"></i> Lihat
                        Keranjang</button></p>
            </a>

            <p> Detail Barang</p>
            <table class="table table-bordered">
                <tr>
                    <th>Nama Barang</th>
                    <th>Estimasi Waktu</th>
                    <th>Jumlah Barang</th>
                    <th>Alamat</th>
                </tr>
                <tr>
                    <td>{{ $datacheckout['nama_barang'] }}</td>
                    <td>
                        {{ $datacheckout['waktu'] }} Hari</td>
                    <td>{{ $datacheckout['jumlah'] }} Buah</td>
                    <td>{{ $datacheckout['alamat'] }}</td>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th>Pembayaran </th>
                    <td>Alfamart </td>
                </tr>
                <tr>
                    <th>Biaya Layanan</th>
                    <td>Rp {{ number_format($datacheckout['biaya_layanan']) }}</td>

                </tr>
                <tr>
                    <th>Biaya PPN (10%)</th>
                    <td>Rp {{ number_format($datacheckout['biaya_PPN']) }}</td>
                </tr>
                <tr>
                    <th>Biaya Operasional (10%)</th>
                    <td>Rp {{ number_format($datacheckout['biaya_operasional']) }}</td>
                </tr>
                <tr>
                    <th>Biaya Pembuatan</th>
                    <td>Rp {{ number_format($datacheckout['biaya_pembuatan']) }}</td>
                </tr>
                <tr>
                    <th>Biaya Total</th>
                    <td> Rp {{ number_format($datacheckout['biaya_total']) }}</td>
                </tr>
            </table>
            <br>

            <br>


        </div>
        {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
    </div>
@endsection
