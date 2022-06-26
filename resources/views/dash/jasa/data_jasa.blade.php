@extends('template_dashboard')
@section('title')
    Data Jasa
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
    <div class="card shadow-lg">
        <div  class="card-header">
            <b class="text-white">Data Jasa</b>
        </div>
        <div class="card-header">
            <a href="" data-bs-toggle="modal" data-bs-target="#create_jasa" class="btn btn-warning"><i class="fas fa-plus"></i> Tambah Jasa</a>
            @include('dash.jasa.create_jasa')
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Jasa</th>
                        <th>Nama Jasa</th>
                        <th>Harga</th>
                        <th>Ketegori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($jasa as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->id_jasa }}</td>
                        <td>{{ $data->nm_jasa }}</td>
                        <td>{{ number_format($data->harga,2) }}</td>
                        <td>
                           <span class="badge bg-primary">{{ $data->ketegori }}</span> 
                        </td>
                        <td>
                            <form action="{{ url('/data-jasa', $data->id_jasa) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin Untuk Menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#edit_jasa{{ $data->id_jasa }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @include('dash.jasa.edit_jasa')
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection