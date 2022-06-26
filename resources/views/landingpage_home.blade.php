@extends('template_landingpage')
@section('hero')
<div class="myhero mt-5">
    <div class="judul">
        <h4 >Kami Melayani <span id="typed"></span></h4>
        <br><br>
        {{-- <p class="mt-3">CV. INTTECH<br>
        kami siap melayani permasalahan gadget anda --}}
        </p>
    </div>
    <div class="hero-img mt-4" >
        <img src="{{ asset('landingpage/assets/img/mobile.svg') }}" width="50%">
        {{-- <img style="border-top-left-radius: 30px;border-top-right-radius: 30px;box-shadow: 0 4px 20px 0 rgba(0,0,0,0.25);" data-aos="fade-up"
        data-aos-duration="1000" data-aos-anchor-placement="top-bottom" src="{{ asset('landingpage/assets/img/hero-img-2.jpg') }}" width="70%"> --}}
    </div>
    <br><br>
</div>
@endsection
@section('content')
      <!-- workspace -->
  <div class="workspace">
    <div class="container pl-5 pr-5">
        <div class="row mt-5">
            <div class="text col-lg-6  pl-5 " data-aos="fade-up">
                <h4 class="mt-5">HP Kamu Rusak?<br> Laptop Kamu Error? <br><br><span style="color: #FA7854;">Kami Punya Solusinya!</span></h4>
                <p class="mt-4 text-justify"><b>CV. Inntech</b> melayani jasa service Laptop dan handphone, jasa instalasi OS dan pergantian komponen laptop atau komputer seperti hard disk, ram dan alat lainnya. <b>CV. Inttech</b> sudah memiliki pengalaman dari 2016 dengan tenaga ahli yang profesional dan terpercaya. Yuk perbaiki gadget anda sekrang juga!</p>
                <a href="{{ url('login') }}" data-aos="fade-up" data-aos-duration="500" class="btn btn-warning text-white">Perbaiki Gadget Saya</a>
            </div>
            <div align="right" class="img col-lg-6 pr-5" data-aos="fade-up">
                <img src="{{ asset('landingpage/assets/img/ilus-1.svg') }}" width="60%">
            </div>
        </div>
    </div>
</div>
<!-- akhir workspace -->
<!-- exllence -->
<div class="exellence mt-5 mb-5">
    <div class="card p-3">
        <h4 data-aos="fade-up" data-aos-duration="1000">Kenapa Memilih CV. Inttech</h4>
        <p data-aos="fade-up" data-aos-duration="1000">Keunggulan yang akan kamu dapatkan dari kami</p>
        <div class="row mt-4 mb-5 p-3">
            <div class="col-lg-3 mt-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
                <div class="card p-4 shadow">
                    <div class="ikon">
                        <i class="fas fa-user-tie"></i>
                        <p class="mt-4"><span>Teknisi Profesional</span> <br>Kami memiliki teknisi yang profesional di bidangnya</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
                <div class="card p-4 shadow">
                    <div class="ikon">
                        <i class="fas fa-thumbs-up"></i>
                        <p class="mt-4"><span>Berkualitas & Bergaransi</span> <br>Kami menyediakan sparepark yang Berkualitas dan Bergaransi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
                <div class="card p-4 shadow">
                    <div class="ikon">
                        <i class="fas fa-hand-holding-usd"></i>
                        <p class="mt-4"><span>Harga Relatif Murah</span> <br>Harga lebih terjangkau dengan tetap mempertahankan kualitas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
                <div class="card p-4 shadow">
                    <div class="ikon">
                        <i class="fas fa-biking"></i>
                        <p class="mt-4"><span>Layanan Antar Jemput</span> <br>Sekarang nggk repot lagi langsung ke kantor</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- popular -->
        <div class="popular" id="layanan">
            <div class="container mt-5">
                <h4 data-aos="fade-up" data-aos-duration="1000">Layanan Kami</h4>
                <p data-aos="fade-up" data-aos-duration="1000">Berbagai layanan yang kami sediakan <br> untuk kebutuhan anda</p>
                <div class="row mt-4 mb-5">
                    <div class="col-lg-4 col-md-6">
                        <a href="" class="card mt-4 p-3" data-aos="fade-up" data-aos-duration="1000">
                            <div class="img ">
                                <img src="{{ asset('landingpage/assets/img/layanan-2.jpg') }}" width="100%" height="100%">
                            </div>
                            <div class="judul_kelas mt-3">
                                <h4>Install Windows</h4>
                                <p style="color: #FA7854;">Komputer</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="" class="card mt-4 p-3" data-aos="fade-up" data-aos-duration="1000">
                            <div class="img ">
                                <img src="{{ asset('landingpage/assets/img/layanan-4.jpg') }}" width="100%" height="100%">
                            </div>
                            <div class="judul_kelas mt-3">
                                <h4>Ganti/Upgarde Ram</h4>
                                <p style="color: #FA7854;">Laptop</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="" class="card mt-4 p-3" data-aos="fade-up" data-aos-duration="1000">
                            <div class="img ">
                                <img src="{{ asset('landingpage/assets/img/layanan-3.jpg') }}" width="100%" height="100%">
                            </div>
                            <div class="judul_kelas mt-3">
                                <h4>Ganti Hardisk/SDD</h4>
                                <p style="color: #FA7854;">Komputer</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="" class="card mt-4 p-3" data-aos="fade-up" data-aos-duration="1000">
                            <div class="img ">
                                <img src="{{ asset('landingpage/assets/img/layanan-6.jpg') }}" width="100%" height="100%">
                            </div>
                            <div class="judul_kelas mt-3">
                                <h4>Perbaiki/Ganti Procesor</h4>
                                <p style="color: #FA7854;">Laptop</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="" class="card mt-4 p-3" data-aos="fade-up" data-aos-duration="1000">
                            <div class="img ">
                                <img src="{{ asset('landingpage/assets/img/layanan-1.jpg') }}" width="100%" height="100%">
                            </div>
                            <div class="judul_kelas mt-3">
                                <h4>Perbaiki Motheboard</h4>
                                <p style="color: #FA7854;">Komputer</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="" class="card mt-4 p-3" data-aos="fade-up" data-aos-duration="1000">
                            <div class="img ">
                                <img src="{{ asset('landingpage/assets/img/layanan-5.jpg') }}" width="100%" height="100%">
                            </div>
                            <div class="judul_kelas mt-3">
                                <h4>Ganti Sparepart Handphone</h4>
                                <p style="color: #FA7854;">Handphone</p>
                            </div>
                        </a>
                    </div>
                    <!-- <div class="col-lg-12 mt-3 mb-3 text-center">
                        <h4 class="text-center">Dan masing banyak lagi layanan kami!</h4>
                    <a href=""  data-aos="fade-up" data-aos-duration="2000" class="btn btn-danger mt-3 mb-3 ">Daftar Sekarang</a>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- merk -->
        <div class="poppular mt-3 mb-3">
            <div class="container">
                <h4 data-aos="fade-up" data-aos-duration="1000">Merk Laptop/HP yang Dapat Kami Perbaiki</h4>
                <p data-aos="fade-up" data-aos-duration="1000">Berbagai jenis merk Laptop dan handphone anda yang siap kami perbaiki</p>
                <div data-aos="fade-up" data-aos-duration="1000" class="row mt-3">
                    <div class="col-lg-2  col-md-4 col-4 ">
                        <img src="{{ asset('landingpage/assets/img/m-1.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4">
                        <img src="{{ asset('landingpage/assets/img/m-3.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4">
                        <img src="{{ asset('landingpage/assets/img/m-6.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4">
                        <img src="{{ asset('landingpage/assets/img/m-5.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4">
                        <img src="{{ asset('landingpage/assets/img/m-7.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4">
                        <img src="{{ asset('landingpage/assets/img/m-8.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4">
                        <img src="{{ asset('landingpage/assets/img/m-9.png') }}" width="100%" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4">
                        <img src="{{ asset('landingpage/assets/img/m-4.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="col-lg-2 col-md-4 col-4">
                        <img src="{{ asset('landingpage/assets/img/m-10.png') }}" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- merk -->

                 <!-- review -->
        <!-- <div class="review" id="testimoni">
            <div class="container mt-5">
                <h4  data-aos="fade-down" data-aos-duration="1000">Testimoni Pelanggan Kami</h4>
                <p  data-aos="fade-down" data-aos-duration="1000">Kami akan selalu berusaha  <br> untuk memberikan pelayanan terbaik kepada pelanggan kami</p>
                <div class="row mt-5 mb-5"  data-aos="fade-down" data-aos-duration="1500">
                    <div class="col-lg-4">
                        <div class="card p-3 mt-4 shadow">
                            <p>" Servicenya Bagus, proses cepat, dan harga murah. terimakasih CV. Inttech "</p>
                            <hr>
                            <div class="author">
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <h4 class="mt-3">Muhammad Alan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3 mt-4 shadow">
                            <p>" Sparepartnya Original, nggk nyesel deh kalau servis laptop saya disini "</p>
                            <hr>
                            <div class="author">
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <h4 class="mt-3">Anggi Wijaya</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3 mt-4 shadow">
                            <p>" Mantap! ada layanan antar jemput, jadi nggk perlu keluar rumah lagi, hehehe "</p>
                            <hr>
                            <div class="author">
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <i class="fas fa-star" style="color: #FA7854;"></i>
                                <h4 class="mt-3">Ilham Maulana</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <a href=""  data-aos="fade-up" data-aos-duration="2000" class="btn btn-warning text-white">Review Lainnya</a>
            </div>
        </div> -->
        <!-- akhir review -->
    </div>
</div>
@endsection
