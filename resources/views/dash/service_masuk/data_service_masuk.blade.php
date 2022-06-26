@extends('template_dashboard')
@section('title')
    Data Service Masuk
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
@if (session()->has('success'))
    <div class="alert alert-success">
       {{ session()->get('success') }}
    </div>
@endif
<div class="card shadow-lg mb-5">
    <div  class="card-header">
        <b class="text-white">Service Masuk</b>
    </div>
    <div class="card-header">
        {{-- <a href="" data-bs-toggle="modal" data-bs-target="#create_service_masuk"  class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Service Masuk</a>
        @include('dash.service_masuk.create_service_masuk') --}}
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Service</th>
                    <th>Nama Teknisi</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Masuk</th>
                    <th>Jenis Layanan</th>
                    <th>Status</th>
                    <th>Pilih Aksi</th>
                    <th>Lihat Unit</th>
                    <th>Hapus</th>
                    <th>Hubungi Pelanggan</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($service_masuk as $data) 
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->id_service }}</td>
                <td>
                @if ($data->nm_teknisi==false)
                    tidak ada
                @else
                    
                {{ $data->nm_teknisi }}
                @endif
                </td>
                <td>{{ $data->nm_pelanggan }}</td>
                <td>{{ $data->tanggal_masuk }}</td>
                <td>{{ $data->jenis_layanan }}</td>
                <td>
                @if ($data->status==1)
                    <span class="badge bg-danger">Belum di Proses</span>
                @endif
                @if ($data->status==2)
                    <span class="badge bg-warning"> Unit Telah diterima admin</span>
                @endif
                @if ($data->status==3)
                    <span class="badge bg-primary"> Unit telah dikirim ke Teknisi</span>
                @endif
                @if ($data->status==6)
                    <span class="badge bg-danger"> Di Tunda oleh teknisi</span>
                @endif
                @if ($data->status==5)
                    <span class="badge bg-info"> Sedang diproses oleh Teknisi</span>
                @endif
                @if ($data->status==7)
                    <span class="badge bg-success">Sudah diselesaikan oleh teknisi</span>
                @endif
                </td>
                
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="flase">Pilih Aksi</button>
                        <ul style="z-index: 1000" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            
                            @if ($data->status == 1)
                                
                            <li>
                                
                                <a onclick="return confirm('Apakah Unit Telah diterima oleh admin?')" href="{{ url('terima-admin',$data->id_service) }}" class="dropdown-item">Unit telah diterima admin</a>
                                
                            </li>
                            @endif
                            @if ($data->status==2)
                                
                            <li><a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#kirim_teknisi{{ $data->id_service }}">Kirim ke Teknisi</a></li>
                            @endif
                            @if ($data->status==7)
                                
                            <li><a onclick="return confirm('Apakah anda yakin?')" href="{{ url('konfirmasi-admin',$data->id_service) }}" class="dropdown-item">Konfirmasi</a></li>
                            @endif
                        </ul>
                    </div>
                </td>
                <td>
                    <a href="{{ url('service-masuk',$data->id_service) }}" class="btn btn-warning text-white">Lihat</a>
                </td>
                <td>
                    <form action="{{ url('/service-masuk', $data->id_service) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin Untuk Menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
                <td class="text-center">
                    <a href="https://wa.me/+62{{ $data->telp }}"><i style="font-size: 30px;color:rgb(8, 219, 131);" class="fab fa-whatsapp"></i></a>
                </td>
            </tr>
            @include('dash.service_masuk.pilih_teknisi')
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection