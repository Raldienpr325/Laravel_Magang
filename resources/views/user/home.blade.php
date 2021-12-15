@extends('home')
@section('home1')
    <h1 class="text-center">Jual Beli Barang Suka Rela</h1>
    <div class="container" style="padding: 20px">
        <div class="row">
            @foreach ($datas as $data)
                <div class="col-lg-3 col-6 col-sm-6  ">
                    <div class="card "
                        style="box-shadow: 0px 4px 4px 2px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding:10px">
                        <img src="{{ asset('storage/' . $data->foto) }}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h1>{{ $data->namabarang }}</h1>
                            <p class="card-text"> Harga : {{ $data->stok }}</p>
                            <p class="card-text"> Stok : {{ $data->harga }}</p>
                            <a href="{{ url('checkout', $data->id) }}" class="btn btn-primary">Buy this item</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
