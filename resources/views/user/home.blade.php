@extends('home')
@section('home1')
    <p class="text-center mt-3" style="font-size: 20px">- Numpang Jualan Lur</p>
    <div class="container" style="padding: 20px">
        <div class="row">
            @foreach ($datas as $data)
                <div class="col-lg-4 col-6 col-sm-6  ">
                    <div class="card "
                        style="box-shadow: 0px 4px 4px 2px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding:10px">
                        <img src="{{ asset('storage/' . $data->foto) }}" alt="" class="card-img-top" width="200"
                            height="200">
                        <div class="card-body">
                            <h1>{{ $data->namabarang }}</h1>
                            @if ($data->stok == 0)
                                <p class="card-text"> stok : Habis</p>
                            @else
                                <p class="card-text"> stok : {{ $data->stok }}</p>
                            @endif
                            <p class="card-text"> harga : Rp {{ number_format($data->harga) }}</p>
                            <a href="{{ url('checkout', $data->id) }}" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
