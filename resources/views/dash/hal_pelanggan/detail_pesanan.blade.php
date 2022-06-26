@extends('template_dashboard')
@section('title')
<a style="text-decoration:none;" href="{{ URL::to('pesan-jasa') }}">Data Pesanan </a> / Detail Pesanan
@endsection
@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow mb-5">
            <div style="background-color:#0E0943; " class="card-header text-white">
                Detail Pesanan
            </div>
            <div class="card-body p-4">
                <h4 class="text-center mb-3"><b>CV. INTTECH</b></h4> 
                @if ($detail->status == 8)
                <span class="badge bg-success mb-2"><i class="fas fa-check"></i> Selesai</span>   
                @endif
                @if ($detail->status < 5 && $detail->status > 2)
                <span class="badge bg-primary mb-2"><i class="fas fa-sync-alt"></i> Sedang diproses</span>
                @endif
                @if ($detail->status == 2)
                <span class="badge bg-warning mb-2"><i class="fas fa-sync-alt"></i> Unit telah diterima oleh admin</span>
                @endif
                @if ($detail->status == 1)
                <span class="badge bg-danger mb-2"><i class="fas fa-sync-alt"></i> Belum diproses</span>
                @endif
                @if ($detail->status >= 5 )
                <span class="badge bg-info mb-2"><i class="fas fa-sync-alt"></i> Sedang dikerjakan oleh teknisi</span>
                @endif
                <div class="row">
                    <div class="col-lg-6 col-6 text-left" style="font-weight:bold;">
                       
                        <p style="color:#FA7854;">#ID Service</p>
                        <p>Nama Pelanggan</p>
                        <p>Tanggal Pesanan</p>
                        <p>Nama Unit</p>
                        <p>Kelengkapan Unit</p>
                        <p>Deskripsi Kerusakan</p>
                        <p></p>
                    </div>
                    <div class="col-lg-6 col-6 text-end">
                       
                        <p style="color:#FA7854;"><b>{{ $detail->id_service }}</b></p>
                        <p>{{ $detail->pelanggan->nm_pelanggan }}</p>
                        <p>{{ Carbon\Carbon::parse($detail->tanggal_masuk)->format('l, d/m/Y H:i')}}</p>
                        <p>{{ $detail->detail_service->nm_unit }}</p>
                        <p>{{ $detail->detail_service->kelengkapan_unit }}</p>
                        <p>{{ $detail->detail_service->deskripsi_kerusakan }}</p>
                    </div>
                </div>
               
                    
                <div class="alert alert-info">
                    <p>Pesanan akan selesai dalam 2 - 3 hari kedepan! <b><a href="https://wa.me/+62085219443129?text=Admin%20saya%20perlu%20bantuan">Hubungi admin untuk info lebih lanjut</a></b></p>
                </div>
             
            </div>
            <div class="card-footer">
                <a href="{{ url('pesan-jasa') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection