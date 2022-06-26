@extends('template_dashboard')
@section('title')
   <a href="{{ url('home') }}" style="text-decoration: none"> Home</a> / Pesanan Success
@endsection
@section('konten')
    <div class="row justify-content-center mx-auto">
        <div class="col-lg-6 ">
            <div class="card mb-5 text-center" style="border: none ;">

                <img width="100%" src="{{ asset('dash/assets/img/success-1.jpg') }}" alt="">
                <h1 class="text-center mb-5">Yey! Kami akan segera memprosesnya!</h1>
                <a class="btn btn-danger" href="{{ url('pesan-jasa',$id_service) }}" >Lihat Pesanan</a>
            </div>
        </div>
    </div>
    
@endsection
