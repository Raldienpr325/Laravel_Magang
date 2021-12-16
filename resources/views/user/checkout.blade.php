@extends('home')
@section('checkout')
<div class="content">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama Barang</th>
                <th>Foto</th>
                <th>Stok</th>
                <th>Harga Satuan</th>
                <th>Jumlah Barang Dibeli</th>
            </tr>
                <tr>
                    <td>{{ $layanan["namabarang"] }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $layanan["foto"] ) }}" style="max-height: 140px">
                    </td>
                    <td>{{ $layanan["stok"] }}</td>
                    <td>{{ $layanan["harga"] }}</td>
                    {{-- <td>
                        <a href="{{ url('delete-layanan', $layanan->id) }}"> <button
                                class="btn btn-danger">delete</button></a>
                        <a href="{{ url('edit-layanan', $layanan->id) }}"> <button
                                class="btn btn-warning">update</button></a>
                    </td> --}}
                    <td><form action="{{ url('checkout2', $layanan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf {{-- -> fitur keamanan dari laravel --}}
                        <div class="form-group">
                            <input type="text" id="jumlah" name="jumlah"
                                class="form-control @error('jumlah') is-invalid     
                        @enderror" placeholder="Jumlah Barang"
                                required autofocus value="{{ old('jumlah') }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-group-sm">Beli</button>
                        </div>
                    </form></td>
                </tr>
        </table>
    </div>
    {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
</div>
@endsection
