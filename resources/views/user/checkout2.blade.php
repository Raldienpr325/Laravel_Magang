@extends('home')
@section('checkout')
    <div class="content">
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                Berhasil Checkout !
            </div>
            <p> Detail Barang</p>
            <table class="table table-bordered">
                <tr>
                    <th>Nama Barang</th>
                    <th>Estimasi Waktu</th>
                    <th>Jumlah Barang</th>
                    <th>Alamat</th>
                    <th>Kode Pos</th>
                </tr>
                <tr>
                    <td>{{ $datacheckout['nama_barang'] }}</td>
                    <td>
                        {{ $datacheckout['waktu'] }} Hari</td>
                    <td>{{ $datacheckout['jumlah'] }} Buah</td>

                    <td>Jl Nogosari kavling 20 Malang</td>
                    <td>123123</td>
                </tr>
            </table>
            <br>
            <p> Detail Pembayaran</p>
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
            <table class="table table-bordered">
                <tr>
                    <th>Bayar sekarang</th>
                    <td><button class="btn  btn-danger">Bayar</button></td>
                </tr>
            </table>
            <br>


        </div>
        {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
    </div>
@endsection
