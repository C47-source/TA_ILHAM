@extends('template_dashboard')
@section('title')
   Data Teknisi
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
        <b class="text-white">Teknisi</b>
    </div>
    <div class="card-header">
        <a href="" data-bs-toggle="modal" data-bs-target="#create_teknisi" class="btn btn-warning"><i class="fas fa-plus"></i> Tambah Teknisi</a>
        @include('dash.teknisi.create_teknisi')
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Teknisi</th>
                    <th>Nama Pelanggan</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($teknisi as $data) 
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->id_teknisi }}</td>
                <td>{{ $data->nm_teknisi }}</td>
                <td>{{ $data->telp }}</td>
                <td>{{ $data->email }}</td>
                <td>
                <form action="{{ url('/data-teknisi', $data->id_teknisi) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin Untuk Menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>

                </td>
                <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#edit_teknisi{{ $data->id_teknisi }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                </td>
                </tr>
                @include('dash.teknisi.edit_teknisi')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection