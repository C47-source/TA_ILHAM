@extends('template_dashboard')
@section('title')
   Data Transaksi
@endsection
@section('konten')
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">
       {{ session()->get('success') }}
    </div>
@endif
<div class="card shadow-lg">
    <div class="card-header">
        <b class="text-white">Data Transaksi</b>
    </div>
    <div class="card-header mt-5">
        <b>Cetak Laporan</b>
       <div class="row">
       <form action="{{ url('cetak-laporan') }}" method="POST">
        @csrf
        <div class="col-lg-4 col-6 mb-3">
            <div class="form-group">
                <label for="">Tanggal Awal</label>
                <input name="tgl_awal" type="date" class="form-control">
            </div>
        </div>
        <div class="col-lg-4 col-6  mb-3">
            <div class="form-group">
                <label for="">Tanggal Akhir</label>
                <input name="tgl_akhir" type="date" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-6  mb-3">
            <div class="form-group">
                <button type="submit" class="btn btn-danger"><i class="fas fa-print"></i> Cetak</button>
            </div>
        </div>
       </form>
       </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Service</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Unit</th>
                    <th>Pembelian</th>
                    <th>Total Biaya</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        <a href="{{ url('service-masuk',$item->id_service) }}">{{ $item->id_service }}</a>
                    </td>
                    <td>{{ $item->nm_pelanggan }}</td>
                    <td>{{ $item->nm_unit }}</td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#t_jasa{{ $item->id_service }}" class="btn btn-danger"><i class="fas fa-cog"></i> Jasa</a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#t_sparepart{{ $item->id_service }}" class="btn btn-primary"><i class="fas fa-tablet-alt"></i> Sparepart</a>
                    </td>
                    <td>
                        {{ number_format($item->total_harga,2) }}

                    </td>
                    <td>
                      <a href="{{ url('cetak',$item->id_service) }}" class="btn btn-danger"> <i class="fas fa-print"></i> </a>  
                    </td>
                </tr>
                @include('dash.transaksi.transaksi_jasa')
                @include('dash.transaksi.transaksi_sparepart')
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection