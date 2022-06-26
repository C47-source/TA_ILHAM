<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('landingpage/assets/style.css') }}">
    <!-- animasi -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- font awesome -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('landingpage/assets/fontawesome/css/all.css') }}" rel="stylesheet">
    <!-- ikon -->


    <title>CV INTTECH | Solusi Masalah IT</title>
  </head>
  <body>
    <div class="halaman-utama">
        <div class="container">
            <!-- header -->
            <nav class="navbar navbar-expand-lg navbar-dark p-4">
              <a class="navbar-brand" href="/"><b style="font-size: 32px;">CV. INTTECH</b></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-md-auto">
                  <a class="nav-link" href="/">HOME</a>
                  <a class="nav-link" href="{{ route('produk') }}">SHOP</a>
                  <a class="nav-link" href="/#layanan">LAYANAN</a>
                  <!-- <a class="nav-link" href="/#testimoni">TESTIMONI</a> -->
                  {{-- <a class="nav-link" href="">KONTAK KAMI</a> --}}
                  
                  <div class="garis">
                  </div>
                  <a href="{{ url('daftar') }}" class="nav-link" >DAFTAR</a>
                  <a href="{{ url('login') }}" class="nav-link btn btn-warning tombol">LOGIN</a>
                </div>
              </div>
            </nav>
            <!-- akhir header -->
            <!-- hero -->
            @yield('hero')
            <!-- akhir hero -->
        </div>
    </div>

  @yield('content')


    <!-- footer -->

    <div class="footer">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-lg-4 mb-5 pl-5 pr-5">
                    <span style="font-size: 32px;color: #FA7854;"><b>CV. INTTECH</b></span>
                    <p>CV.  Inttech  ini  berdiri  pada  tahun  2016  dengan  tujuan  untuk  dapat  memberikan 
                        pelayanan  di  bidang  jasa  service,  instalasi  software  operation  system  (OS)  laptop  dan 
                        komputer  serta  menjual  komponen  laptop  atau  komputer seperti  hard  disk,  ram  dan  alat 
                        lainnya</p>
                </div>
                <div class="col-lg-4 pl-5 pr-5 mb-5">
                    <span style="font-size: 32px;color: #FA7854;"><b>Alamat</b></span>
                    <p class="mb-auto">cvinttech@gmail.com</p>   
                    <p>Jl.Ulu  Lolo,  Nagari  Lolo,  Kec.  Pantai  Cermin, 
                        Kab.  Solok</p>   
                </div>
                <div class="col-lg-4 pl-5 pr-5 mb-5">
                    <span style="font-size: 32px;color: #FA7854;"><b>Sosial Media</b></span>
                    <p><a href="">Instagram</a></p>   
                    <p><a href="">Facebook</a></p>   
                </div>
            </div>
            <p class="p-5 copyright">© 2021 - 2022 CV. Inttech</p>
        </div>
    </div>
    <!-- akhir footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- ketik js -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
    <!-- animasi -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('dash/js/datatables-simple-demo.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- main js -->
    <script type="text/javascript" src="{{ asset('landingpage/assets/main.js') }}"></script>
    <script>
        AOS.init();
    </script>
  </body>
</html>
