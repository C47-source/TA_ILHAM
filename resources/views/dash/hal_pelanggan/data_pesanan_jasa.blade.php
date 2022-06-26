@extends('template_dashboard')


@section('title')
Pesanan Akif
@endsection
@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-6 mb-3">
        @forelse ($pesan_jasa as $data) 
            <div class=" card mb-3">
                <div style="background-color:#0E0943 ;" class="card-header text-white">
                    #{{ $data->id_service }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10 col-8">
                    <p><span style="font-size: 20px; font-weight:bold;">{{ $data->detail_service->nm_unit }}</span> <br> {{ Carbon\Carbon::parse($data->tanggal_masuk)->format('l, d/m/Y H:i') }}</p>
                            @if ($data->status == 1)
                            <span class="badge bg-primary"><i class="fas fa-sync-alt"></i> Sedang diproses</span>  
                            @endif
                            @if($data->status == 6)
                            <span class="badge bg-success"><i class="fas fa-check-circle"></i> Selesai</span> 
                            @endif
                           
                        </div>
                        <div class="col-lg-2 col-4">
                        <a  href="{{ url('pesan-jasa',$data->id_service) }}" style="background-color:#0E0943 ;border:none;" class="btn btn-primary">Lihat</a>
                       </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="card mb-5 text-center" style="border: none ;">
                <img width="100%" src="{{ asset('dash/assets/img/empty.jpg') }}" alt="">
                    <h1 class="text-center mb-5">Yah! Pesananmu masih kosong nih!</h1>
            </div>  
            @endforelse
        </div>
    </div>
@endsection