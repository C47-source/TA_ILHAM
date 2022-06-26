@extends('template_dashboard')
@section('title')
   Data User
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
        <b class="text-white">Data User</b>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                    @if ($data->level == 'admin')
                        <span class="badge bg-danger">Admin</span>  
                    @endif
                    @if ($data->level == 'teknisi')
                        <span class="badge bg-success">Teknisi</span>  
                    @endif
                    @if ($data->level == 'pelanggan')
                        <span class="badge bg-primary">Pelanggan</span>  
                    @endif
                    </td>
                    <td>
                        <form action="{{ url('/data-user', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin Untuk Menghapus?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>

                       
                    </td>
                    <td>
                        <a href="{{ url('data-user/'.$data->id_user.'/edit') }}" class="btn btn-warning text-white"><i class="fas fa-key"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection