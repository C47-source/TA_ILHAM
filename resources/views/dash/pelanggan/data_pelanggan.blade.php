@extends('template_dashboard')
@section('title')
    Data Pelanggan
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
    <div  class="card-header">
        <b class="text-white">Data Pelanggan</b>
    </div>
    <div class="card-header">
        <a href="" data-bs-toggle="modal" data-bs-target="#create_pelanggan" class="btn btn-warning"><i class="fas fa-plus"></i> Tambah Pelanggan</a>

        @include('dash.pelanggan.create_pelanggan')
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pelanggan as $data) 
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->id_pelanggan }}</td>
                <td>{{ $data->nm_pelanggan }}</td>
                <td>{{ $data->telp }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->alamat }}</td>
                <td>
                <form action="{{ url('/data-pelanggan', $data->id_pelanggan) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin Untuk Menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>

                </td>
                <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#edit_pelanggan{{ $data->id_pelanggan }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            @include('dash.pelanggan.edit_pelanggan')
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection