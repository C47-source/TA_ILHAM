@extends('template_dashboard')
@section('title')
<a style="text-decoration:none;" href="{{ URL::to('home') }}">Home </a> / Profil Pelanggan
@endsection
@section('konten')
<div class="row justify-content-center">
    <div class="col-lg-6">
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
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow mb-5">
            <div style="background-color:#0E0943; " class="card-header text-white">
                Profil Pelanggan
            </div>
            <form action="{{ url('profil-update') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="text" hidden name="id_pelanggan" class="form-control" value="{{ $pelanggan->id_pelanggan }}">
                        <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nm_pelanggan }}">
                        <label for="">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="telepon" class="form-control" value="{{ $pelanggan->telp}}">
                        <label for="">Telepon</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input readonly type="email" name="email" class="form-control" value="{{ $pelanggan->user->email}}">
                        <label for="">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                    <textarea class="form-control" name="alamat" id="" cols="30" rows="20">{{ $pelanggan->alamat }}</textarea>
                        <label for="">Alamat</label>
                    </div>
                </div>  
                <div class="card-footer">
                    <a href="{{ url('home') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a>
                    <button type="submit" class="btn btn-primary"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection