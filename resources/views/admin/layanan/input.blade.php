@extends('home')
@section('input-layanan')
    <div class="content">
        <div class="card-body">
            <form action="{{ url('simpan-vote') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- -> fitur keamanan dari laravel --}}
                <div class="form-group">
                    <input type="file" id="foto" name="foto"
                        class="form-control @error('foto') is-invalid 
                @enderror" placeholder="foto" required
                        autofocus value="{{ old('foto') }}">
                </div>
                <div class="form-group">
                    <input type="text" id="namabarang" name="namabarang"
                        class="form-control @error('namabarangbarang') is-invalid 
                @enderror"
                        placeholder="Nama Barang" required autofocus value="{{ old('namabarang') }}">
                </div>
                <div class="form-group">
                    <input type="text" id="stok" name="stok"
                        class="form-control @error('stok') is-invalid 
                @enderror" placeholder="stok" required
                        autofocus value="{{ old('stok') }}">
                </div>
                <div class="form-group">
                    <input type="text" id="harga" name="harga"
                        class="form-control @error('harga') is-invalid     
                @enderror" placeholder="harga"
                        required autofocus value="{{ old('harga') }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-group-sm">input data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
