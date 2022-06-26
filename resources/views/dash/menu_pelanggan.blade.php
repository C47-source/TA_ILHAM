<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light shadow" id="sidenavAccordion" style="background-color: #0D6EFD !important;">
        <div class="sb-sidenav-menu">
            <div class="nav mb-5">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ URL::to('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Pemesanan Saya</div>
                <a class="nav-link" href="{{ URL::to('pesan-jasa') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sync-alt"></i></div>
                    Sedang di Proses
                </a>
                <a class="nav-link" href="{{ URL::to('pesan-jasa-selesai') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-check-circle"></i></div>
                    Selesai
                </a>
                <div class="sb-sidenav-menu-heading">Pengaturan</div>
                <a class="nav-link" href="{{ URL::to('profil-pelanggan',Auth::user()->id_user) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Profil
                </a>
                <a class="nav-link"  href="{{ url('setting-password') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                    Setting Password
                </a>
                <div class="sb-sidenav-menu-heading">Bantuan</div>
                <a data-bs-toggle="modal" data-bs-target="#kontakadmin" class="nav-link" href="">
                    <div class="sb-nav-link-icon"><i class="fas fa-headphones-alt"></i></div>
                    Hubungi Admin
                </a>
               
              
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>

@include('dash.kontak_admin')