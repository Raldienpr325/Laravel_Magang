@extends('home')
@section('edit-layanan')
    <div class="content">
        <div class="card-body">
            <form action="{{ url('update-layanan', $layanan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" id="namabarang" name="namabarang"
                        class="form-control @error('namabarang') is-invalid 
                @enderror"
                        placeholder="namabarang " required autofocus value="{{ $layanan->namabarang }}">
                </div>
                <div class="form-group">
                    <input type="text" id="stok" name="stok"
                        class="form-control @error('stok') is-invalid     
                @enderror" placeholder="stok "
                        required autofocus value="{{ $layanan->stok }}">
                </div>
                <div class="form-group">
                    <input type="text" id="harga" name="harga"
                        class="form-control @error('harga') is-invalid     
              @enderror" placeholder="harga "
                        required autofocus value="{{ $layanan->harga }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-group-sm">input data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
