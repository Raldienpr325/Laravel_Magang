@extends('home')
@section('checkout')
    <div class="content mt-3">
        <div class="alert alert-success" role="alert">
            Pembayaran Berhasil Dilakukan
        </div>
        <a href="{{ url('home') }}"> <button class="btn btn-primary btn-sm">Home</button></a>

    </div>
@endsection
