@extends('template_dashboard')
@section('title')
   Home
@endsection
@section('konten')
{{-- home pelanggan --}}
@if (Auth::user()->level == 'pelanggan')
<div class="row">
    <div class="col-md-4">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat Datang {{ Auth::user()->pelanggan->nm_pelanggan }}!</strong> Kami siap membantu masalah Gadget Kamu!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-md-6">
        <div class="card bg-info shadow-lg text-white mb-4">
            <div class="card-body text-center"><i style="font-size: 50px" class="fas fa-tablet-alt"></i></div>
            <div class="card-body text-center">Service Handphone</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('pesan-jasa/handphone') }}">Pesan Jasa Sekarang</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6">
        <div class="card bg-danger shadow-lg text-white mb-4">
            <div class="card-body text-center"><i style="font-size: 50px" class="fas fa-laptop-medical"></i></div>
            <div class="card-body text-center">Service Laptop</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('pesan-jasa/laptop') }}">Pesan Jasa Sekarang</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
@endif

{{-- home teknisi --}}
@if (Auth::user()->level == 'teknisi')


<div class="row">
    <div class="col-md-4">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat Datang Teknisi {{ Auth::user()->teknisi->nm_teknisi }}!</strong> Selamat Bekerja!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card bg-info shadow-lg text-white mb-4">
            <div class="card-body text-center"><h5><b>Service Masuk</b></h5></div>
            <div class="card-body text-center"><h4><b>{{ $service_masuk->count('id_service') }}</b></h4></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('service-masuk-teknisi') }}">Lihat </a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-danger shadow-lg text-white mb-4">
            <div class="card-body text-center"><h5><b>Proses Perbaikan</b></h5></div>
            <div class="card-body text-center"><h4><b>{{ $proses->count('id_service') }}</b></h4></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('proses-perbaikan') }}">Lihat</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-success shadow-lg text-white mb-4">
            <div class="card-body text-center"><h5><b>Selesai</b></h5></div>
            <div class="card-body text-center"><h4><b>{{ $selesai->count('id_service') }}</b></h4></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('service-masuk-teknisi') }}">Lihat</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
@endif
@if (Auth::user()->level == 'admin')
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card bg-info shadow-lg text-white mb-4">
            <div class="card-body text-center"><b style="font-size: 30px">{{ $pelanggan->count('id_pelanggan')}}</b></div>
            <div class="card-body text-center">Jumlah Pelanggan</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('data-pelanggan') }}">Lihat</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-warning shadow-lg text-white mb-4">
            <div class="card-body text-center"><b style="font-size: 30px">{{ $teknisi->count('id_teknisi') }}</b></div>
            <div class="card-body text-center">Jumlah Teknisi</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('data-teknisi') }}">Lihat</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-primary shadow-lg text-white mb-4">
            <div class="card-body text-center"><b style="font-size: 30px">{{ $service_masuk->count('id_service') }}</b></div>
            <div class="card-body text-center">Jumlah Service Masuk</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('service-masuk') }}">Lihat</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-secondary shadow-lg text-white mb-4">
            <div class="card-body text-center"><b style="font-size: 30px">{{ $jasa->count('id_jasa') }}</b></div>
            <div class="card-body text-center">Jumlah Jasa</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('data-jasa') }}">Lihat</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-danger shadow-lg text-white mb-4">
            <div class="card-body text-center"><b style="font-size: 30px">{{ $spart->count('id_sparepart') }}</b></div>
            <div class="card-body text-center">Jumlah Sparepart</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('data-jasa') }}">Lihat</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-success shadow-lg text-white mb-4">
            <div class="card-body text-center"><b style="font-size: 30px">{{ $transaksi->count('id_service') }}</b></div>
            <div class="card-body text-center">Jumlah Transaksi</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ url('data-transaksi') }}">Lihat</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
