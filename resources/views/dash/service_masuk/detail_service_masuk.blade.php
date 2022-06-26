@extends('template_dashboard')
@section('title')
   <a style="text-decoration:none" href="{{ url('service-masuk') }}">Service Masuk</a> / Detail Service Masuk
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
    <div class="card-header">
        <b>From Detail Data Service Masuk</b>
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
                    <input type="text" readonly value="{{ $service_masuk->nm_pelanggan }}" class="form-control">
                    <label for="">Pilih Pelanggan</label>
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
                     <input type="text" value="{{ $service_masuk->jenis_layanan }}" readonly class="form-control">
                     <label for="">Jenis layanan</label>
                </div>
             </div>
             <div class="col-md-6 col-lg-6">

                <a href="{{ url('service-masuk') }}" class="btn btn-secondary">Kembali</a>
             </div>
        </div>
    </div>
</div>
<div class="card shadow mb-5">
    <div class="card-header text-white" style="background-color:#FA7854;">
        Catatan Teknisi
    </div>
    <div class="card-body">
        <div class="form-group">
            <textarea readonly class="form-control" name="" id="" cols="30" rows="10">{{ $service_masuk->catatan_teknisi }}</textarea>
        </div>
    </div>
</div>
{{-- detail service --}}
<div class="card shadow-lg">
    <div class="card-header">
        <b>Detail Service</b>
    </div>
    <div class="card-header">
        {{-- <a href="" data-bs-toggle="modal" data-bs-target="#create_detail{{ $service_masuk->id_service }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        @include('dash.service_masuk.create_detail') --}}
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Service</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi Kerusakan</th>
                    <th>Kelengkapan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->id_service }}</td>
                    <td>{{ $data->nm_unit }}</td>
                    <td>{{ $data->deskripsi_kerusakan }}</td>
                    <td>{{ $data->kelengkapan_unit }}</td>
                    <td>
                        <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
