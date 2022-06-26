@extends('template_landingpage')

@section('content')
{{-- <div class="popular" id="layanan" >
    <div class="container mt-5">
        <h4 data-aos="fade-up" style="text-align: center" data-aos-duration="1000"><b>PRODUK KAMI</b></h4>
        <p data-aos="fade-up" style="text-align: center" data-aos-duration="1000">Sparepart Original dan Berkualitas</p>
        <div class="container mt-5">
            <div class="row mt-4 mb-5" style="text-align: center;justify-content: center">
                @foreach ($spart as $data)
                <div class="card mt-3 ml-3 mr-3" style="border-radius: 10px" >
                    <div class="card-header" style="background-color: white">
                        <div class="img ">
                            <img src="{{ asset('landingpage/assets/img/layanan-2.jpg') }}" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>{{ $data->nm_sparepart }}</h4>
                        <span style="color:blue; font-size: 20px">Rp. {{ number_format($data->harga) }}</span>
                        <p style="color: #FA7854;">{{ $data->ketegori }}</p>
                    </div>
                    <div class="card-footer">
                        <a style="color: #FA7854" href="https://wa.me/+62081277590838?text={{ $data->nm_sparepart }}%20Admin%20apakah%20sparepart%20ini%20tersedia%20?" class="btn btn-outline-primary"> Beli Sekarang</a>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
    </div>
</div> --}}

<div class="popular" id="layanan">
    <div class="container mt-5">
        <h4 data-aos="fade-up" data-aos-duration="1000">PRODUK KAMI</h4>
        <p data-aos="fade-up" data-aos-duration="1000">Sparepart Original dan Berkualitas</p>
        <div class="row mt-4 mb-5">
            @foreach ($spart as $data)
            <div class="col-lg-4 col-md-6 mt-3">
                <div class="card" style="border-radius: 10px" >
                    <div class="card-header" style="background-color: white">
                        <div>
                            @if ($data->ketegori == 'laptop')
                            <center>
                                <img src="{{ asset('landingpage/assets/img/macbook.png') }}" width="50%" >
                            </center>
                            @else
                            <center>
                                <img src="{{ asset('landingpage/assets/img/handphone.png') }}" width="50%" >
                            </center>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>{{ $data->nm_sparepart }}</h4>
                        <span style="color:blue; font-size: 20px">Rp. {{ number_format($data->harga) }}</span>
                        <p style="color: #FA7854;">{{ $data->ketegori }}</p>
                    </div>
                    <div class="card-footer">
                        <a style="color: white" href="https://wa.me/+62081277590838?text={{ $data->nm_sparepart }}%20Admin%20apakah%20sparepart%20ini%20tersedia%20?" class="btn btn-primary"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>  Beli Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
