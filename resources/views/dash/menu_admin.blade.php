<div id="layoutSidenav_nav" >
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #0D6EFD !important;">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ URL::to('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Data Master</div>
                <a class="nav-link" href="{{ URL::to('data-pelanggan') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Data Pelanggan
                </a>
                <a class="nav-link" href="{{ URL::to('data-teknisi') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-stethoscope"></i></div>
                    Data Teknisi
                </a>
                <a class="nav-link" href="{{ URL::to('data-jasa') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Data Jasa
                </a>
                <a class="nav-link" href="{{ URL::to('data-sparepart') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tablet-alt"></i></div>
                    Data Sparepart
                </a>
                
                <div class="sb-sidenav-menu-heading">Service Masuk</div>
                <a class="nav-link" href="{{ URL::to('service-masuk') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-circle-down"></i></div>
                    Service Masuk
                </a>
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link" href="{{ URL::to('data-transaksi') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt"></i></div>
                    Data Transaksi
                </a>
                <div class="sb-sidenav-menu-heading">Data Users</div>
                <a class="nav-link " href="{{ URL::to('data-user') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Data Users
                </a>
                <div class="sb-sidenav-menu-heading">Pengaturan</div>
                <a class="nav-link mb-5"  href="{{ url('setting-password') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                    Setting Password
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>