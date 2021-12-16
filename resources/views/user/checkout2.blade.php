@extends('home')
@section('checkout')
<div class="content">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama Barang</th>
                <th>Foto</th>
                <th>Jumlah Barang</th>
                <th>Harga Total</th>
            </tr>
                <tr>
                    <td>{{ $layanan2["namabarang"] }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $layanan2["foto"] ) }}" style="max-height: 140px">
                    </td>
                    <td>{{ $jumlah }}</td>
                    <td>{{ $total }}</td>
                </tr>
        </table>
    </div>
    {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
</div>
@endsection