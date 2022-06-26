@extends('template_landingpage')
@section('content')
<div id="daftar" class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <div class="card shadow">
                <div class="card-header" style="background-color:#fb8c00; color:#fff;">Daftar</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('register-pelanggan') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input  placeholder="Masukan Nama" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <input type="text" hidden name="id_user" value="@if($id==false) 91{{ date('Y').date('m') }}01 @endif @if($id==true) {{ $id->id_pelanggan+1 }} @endif">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                           

                            <div class="col-md-12">
                                <input placeholder="Nomor Telepon Aktif" id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>

                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                          
                            <div class="col-md-12">
                                <textarea placeholder="Masukan Alamat Lengkap" required autocomplete="alamat" autofocus name="alamat" id="" cols="30" rows="" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        
                            <div class="col-md-12">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                         
                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group ">
                        <button style="width: 100%" type="submit" class="btn btn-danger mb-2">
                                    Daftar
                        </button>
                        <p class="text-center">-OR-</p>
                        <a href="{{ url('login#login') }}" style="width: 100%" class="btn btn-warning text-white">
                        Login
                        </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
@endsection
