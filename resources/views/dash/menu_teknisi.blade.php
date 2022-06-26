<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light shadow" id="sidenavAccordion" style="background-color: #0D6EFD !important;">
        <div class="sb-sidenav-menu">
            <div class="nav mb-5">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ URL::to('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Service Masuk</div>
                <a class="nav-link" href="{{ URL::to('service-masuk-teknisi') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-circle-down"></i></div>
                    Service Masuk
                </a>
                <div class="sb-sidenav-menu-heading">Proses Perbaikan</div>
                <a class="nav-link" href="{{ URL::to('proses-perbaikan') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Proses perbaikan
                </a>
                <div class="sb-sidenav-menu-heading">Selesai</div>
                <a class="nav-link" href="{{ URL::to('service-selesai') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                    Selesai
                </a>
                <div class="sb-sidenav-menu-heading">Pengaturan</div>
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