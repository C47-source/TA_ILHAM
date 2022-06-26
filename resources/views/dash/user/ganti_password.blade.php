@extends('template_dashboard')
@section('title')
<a style="text-decoration:none;" href="{{ URL::to('home') }}">Home </a> / Setting Password
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
                Setiing Password
            </div>
            <form action="{{ url('data-user',$user->id_user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <div class="col-md-12">
                            <input readonly value="{{ $user->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-12">
                            <input id="password" placeholder="New Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                     
                        <div class="col-md-12">
                            <input id="password-confirm" placeholder="Confirm New Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>  
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection