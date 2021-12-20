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
                    <td>{{ $layanan['namabarang'] }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $layanan['foto']) }}" style="max-height: 140px;">
                    </td>
                        @if ($layanan['stok'] == 0)
                            <div class="alert alert-danger" role="alert">
                                Maaf Untuk Sementara Stok Sudah Habis :(
                            </div>
                            <td>Habis</td>
                            <td>Habis</td>
                            <td>
                                <form>
                                    <fieldset disabled>
                                        <div class="mb-3">
                                            <input type="text" id="disabledTextInput" class="form-control"
                                                placeholder="Stok Habis">
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-group-sm">Beli</button>
                                    </fieldset>
                                </form>
                            </td>
                        @else
                        <td>{{ $layanan['stok'] }}</td>
                        <td>{{ $layanan['harga'] }}</td>
                        <td>
                            <form action="{{ url('checkout2', $layanan->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf {{-- -> fitur keamanan dari laravel --}}
                                <div class="form-group">
                                    <input type="text" id="jumlah" name="jumlah"
                                        class="form-control @error('jumlah') is-invalid     
                        @enderror"
                                        placeholder="Jumlah Barang" required autofocus value="{{ old('jumlah') }}">
                                </div>
                                <div class="form-group">
                                    <input type="text" id="alamat" name="alamat"
                                        class="form-control @error('alamat') is-invalid     
                        @enderror"
                                        placeholder="Alamat Anda" required value="{{ old('alamat') }}">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger btn-group-sm">Beli</button>
                                </div>
                            </form>
                        </td>
                    @endif

                </tr>
            </table>
        </div>
    </div>
@endsection
