<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                @if (auth()->user()->role == 'admin')
                    <a class="nav-link" href="{{ url('alat-musik') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                        Alat Musik
                    </a>
                    <a class="nav-link" href="{{ url('used/list-permohonan') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                        List Permohonan
                    </a>
                    <a class="nav-link" href="{{ url('used/list-pengambilan') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-folder"></i>
                        </div>
                        Pengambilan Barang
                    </a>
                    <a class="nav-link" href="{{ url('used/list-peminjaman') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-folder"></i>
                        </div>
                        Alat Dipinjam
                    </a>
                    <a class="nav-link" href="{{ url('report/peminjaman') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                        Laporan
                    </a>
                    {{-- <a class="nav-link" href="{{ url('used/list-pengajuan') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-setting"></i></div>
                        Master Kategori
                    </a> --}}
                    <a class="nav-link" href="{{ url('users-used/list') }}">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Users
                    </a>
                @endif

                @if (auth()->user()->role == 'peminjam')
                    {{-- pemohon --}}
                    <a class="nav-link" href="{{ url('users-used/profile') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                        Profile
                    </a>
                    <a class="nav-link" href="{{ url('used/list') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                        List Alatmusik
                    </a>
                    <a class="nav-link" href="{{ url('used/list-pengajuan') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                        List Permohonan
                    </a>
                @endif
                {{-- logout --}}
                <a class="nav-link" href="{{ route('logout') }}" id="logout-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>

                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
</div>
