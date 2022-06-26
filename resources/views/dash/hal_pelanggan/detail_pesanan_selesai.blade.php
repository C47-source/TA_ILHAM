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
                @if ($detail->status < 5)
                <span class="badge bg-primary mb-2"><i class="fas fa-sync-alt"></i> Sedang diproses</span>
                @endif
                @if ($detail->status > 5 AND $detail->status <= 7)
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
                        <p>Catatan Teknisi</p>
                    </div>
                    <div class="col-lg-6 col-6 text-end">
                       
                        <p style="color:#FA7854;"><b>{{ $detail->id_service }}</b></p>
                        <p>{{ $detail->pelanggan->nm_pelanggan }}</p>
                        <p>{{ Carbon\Carbon::parse($detail->tanggal_masuk)->format('l, d/m/Y H:i')}}</p>
                        <p>{{ $detail->detail_service->nm_unit }}</p>
                        <p>{{ $detail->detail_service->kelengkapan_unit }}</p>
                        <p>{{ $detail->detail_service->deskripsi_kerusakan }}</p>
                        <p>{{ $detail->catatan_teknisi }}</p>
                    </div>
                </div>
                    <hr>
                <div class="row">

               
                    <div class="col-lg-12 col-12">
                        <p class="text-center"><b >Daftar Biaya</b></p>
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-primary">Nama Jasa/Sparepart</p>
                            </div>
                            <div class="col-lg-6 col-6 text-end">
                                <p class="text-primary">Harga</p>
                            </div>
                        </div>
                        @foreach ($pembelian as $item)
                            <div class="row">

                                <div class="col-lg-6 col-6">
                                    <p>
                                        @if($item->jenis_pembelian == 'jasa') 
                                        {{ $item->nm_jasa }} 
                                        @endif  
                                        @if($item->jenis_pembelian == 'sparepart') 
                                        {{ $item->nm_sparepart }} 
                                        @endif  
                                    </p>
                                </div>
                                <div class="col-lg-6 col-6 text-end">
                                    <p>{{ number_format($item->harga,2) }}</p>
                                </div>
                            </div>
                         @endforeach
                    
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <p><b>Total Biaya :</b></p>
                        </div>
                        <div class="col-lg-6 col-6 text-end">
                            <p><b>{{ 'Rp. '.number_format($detail->transaksi->sum('harga'),2) }}</b></p>
                        </div>
                    </div>
                </div>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ URL::previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a>
                <a href="{{ url('cetak',$detail->id_service) }}" class="btn btn-danger"><i class="fas fa-print"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection