@extends('template_dashboard')

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
<div class="card shadow mb-5">
    <div   class="card-header text-white">
        <b>Service Masuk</b>
    </div>
  
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Service</th>
                    <th>Tanggal Masuk</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Unit</th>
                    <th>Kelengkapan Unit</th>
                    <th>Deskripsi Kerusakan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($service_masuk as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->id_service }}</td>
                    <td>{{ $data->tanggal_masuk }}</td>
                    <td>{{ $data->nm_pelanggan }}</td>
                    <td>{{ $data->nm_unit }}</td>
                    <td>{{ $data->kelengkapan_unit }}</td>
                    <td>{{ $data->deskripsi_kerusakan }}</td>
                    <td>
                        <a href="{{ url('/klik-perbaiki',$data->id_service) }}" onclick="return confirm('Apakah anda ingin memperbaiki Unit Ini?')" class="btn btn-danger"><i class="fas fa-cog"></i> Perbaiki</a>    
                    </td>
                </tr> 
                @empty
                {{-- <tr>
                    <td class="text-center" style="background-color: #ffff" colspan="7"><img  width="200px" src="{{ asset('dash/assets/img/success-1.jpg') }}" alt=""> <br><h3>Yey! Pekerjaanmu sudah selesai</h3> </td>
                </tr>     --}}
                @endforelse
               
            </tbody>
        </table>
    </div>
</div>
@endsection