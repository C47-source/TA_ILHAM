@extends('template_dashboard')
@section('title')
   Data Sparepart
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
        <b class="text-white">Data Sparepart</b>
    </div>
    <div class="card-header">
        <a href="" data-bs-toggle="modal" data-bs-target="#create_sparepart" class="btn btn-warning"><i class="fas fa-plus"></i> Tambah Sparepart</a>
        @include('dash.sparepart.create_sparepart')
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Sparepart</th>
                    <th>Nama Sparepart</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($spart as $data)

                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->id_sparepart }}</td>
                    <td>{{ $data->nm_sparepart }}</td>
                    <td>{{ number_format($data->harga,2) }}</td>
                    <td>
                        <span class="badge bg-primary">{{ $data->ketegori }}</span>
                    </td>
                    <td>
                        <form action="{{ url('/data-sparepart', $data->id_sparepart) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin Untuk Menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#edit_sparepart{{ $data->id_sparepart }}"  class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @include('dash.sparepart.edit_sparepart')
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
