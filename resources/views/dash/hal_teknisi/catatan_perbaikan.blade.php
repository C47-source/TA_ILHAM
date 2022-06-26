@extends('template_dashboard')
@section('title')
   <a style="text-decoration:none" href="{{ url('service-selesai') }}">Service Selesai</a> / Catatan Perbaikan
@endsection
@section('konten')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card mb-3 shadow-lg">
    <div style="background-color:#FA7854;" class="card-header text-white">
        <b>From Detail Proses Perbaikan</b>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 col-lg-6">
               <div class="form-floating mb-3">
                    <input type="text" readonly value="{{ $service_masuk->id_service }}" class="form-control" placeholder="ID Service">
                    <label for="">ID Service</label>
               </div>
            </div>
            <div class="col-md-6 col-lg-6">
               <div class="form-floating mb-3">
                    <input type="text" readonly value="{{ $service_masuk->pelanggan->nm_pelanggan }}" class="form-control">
                    <label for="">Nama Pelanggan</label>
               </div>
            </div>
            <div class="col-md-4 col-lg-6">
                <div class="form-floating mb-3">
                     <input type="text" readonly value="{{ $service_masuk->tanggal_masuk }}" class="form-control" placeholder="ID Service">
                     <label for="">Tanggal Masuk</label>
                </div>
             </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-floating mb-3">
                     <input readonly type="text" value="{{ $service_masuk->detail_service->nm_unit }}" class="form-control">
                     <label for="">Nama Unit</label>
                </div>
             </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-floating mb-3">
                    <textarea readonly name="kerusakan" class="form-control">{{ $service_masuk->detail_service->deskripsi_kerusakan }}</textarea>
                     <label for="">Kerusakan</label>
                </div>
             </div>
             <div class="col-md-6 col-lg-6">
                <div class="form-floating mb-3">
                     <input type="text" readonly value="{{ $service_masuk->detail_service->kelengkapan_unit }}" class="form-control">
                     <label for="">Kelengkapan</label>
                </div>
             </div>
             <div class="col-md-6 col-lg-6">
               
                <a href="{{ url('proses-perbaikan') }}" class="btn btn-secondary">Kembali</a>
             </div>
        </div>
    </div>
</div>

{{-- catatan teknisi --}}
<div class="card shadow mb-5">
    <div class="card-header text-white">
        Catatan Teknisi
    </div>
    <div class="card-header">
        <button  data-bs-toggle="modal" data-bs-target="#catatan{{ $service_masuk->id_service }}" class="btn btn-primary">Tambah Catatan</button>
    </div>
    <div class="card-body">
        <div class="form-group">
            <textarea readonly class="form-control" name="" id="" cols="30" rows="10">{{ $service_masuk->catatan_teknisi }}</textarea>
        </div>
    </div>
</div>

@include('dash.hal_teknisi.tambah_catatan_teknisi')
{{-- catatan teknisi --}}

<div class="card shadow mb-5">
    <div style="background-color:#FA7854;" class="card-header text-white">
        Pembelian Jasa/Sparepart
    </div>
    <div class="card-header">
        @if ($service_masuk->status < 7)
            
        <a href="" data-bs-toggle="modal" data-bs-target="#jasa{{ $service_masuk->id_service }}" class="btn btn-primary"><i class="fas fa-cog"></i> Jasa</a>
        <a href="" data-bs-toggle="modal" data-bs-target="#sparepart{{ $service_masuk->id_service }}" class="btn btn-danger"><i class="fas fa-tablet-alt"></i> Sparepart</a>
        @include('dash.hal_teknisi.tambah_pem_jasa')
        @include('dash.hal_teknisi.tambah_pem_sparepart')
        @endif
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jasa/Sparepart</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($transaksi as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    @if ($data->jenis_pembelian == 'jasa')            
                    <td>{{ $data->nm_jasa }}</td>
                    @endif
                    @if ($data->jenis_pembelian == 'sparepart')            
                    <td>{{ $data->nm_sparepart }}</td>
                    @endif
                    <td>{{ $data->jenis_pembelian }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>
                        <form action="{{ url('/catatan-perbaikan', $data->id_transaksi) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin Untuk Menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection