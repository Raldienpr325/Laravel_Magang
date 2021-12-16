@extends('home')
@section('checkout')
<div class="content">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama Barang</th>
                <th>Estimasi Waktu</th>
                <th>Jumlah Barang</th>
                <th>Biaya Layanan</th>
                <th>Biaya PPN</th>
                <th>Biaya Operasional</th>
                <th>Biaya Pembuatan</th>
                <th>Harga Total</th>
                {{-- <th>Action</th> --}}
            </tr>
                <tr>
                    <td>{{ $datacheckout["nama_barang"] }}</td>
                    <td>
                        {{ $datacheckout["waktu"] }} Hari</td>
                    <td>{{ $datacheckout["jumlah"] }} Buah</td>
                    <td>{{ $datacheckout["biaya_layanan"] }}</td>
                    <td>{{ $datacheckout["biaya_PPN"] }}</td>
                    <td>{{ $datacheckout["biaya_operasional"] }}</td>
                    <td>{{ $datacheckout["biaya_pembuatan"] }}</td>
                    <td>{{ $datacheckout["biaya_total"] }}</td>
                    {{-- <td><a href="{{ url('user-deal', $datacheckout) }}"> <button class="btn btn-warning">DEAL</button></a></td> --}}
                </tr>
        </table>
    </div>
    {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
</div>
@endsection