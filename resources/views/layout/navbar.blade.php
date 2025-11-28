<nav class="navbar fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Registrasi Ahli Waris</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Pilih Halaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                    {{-- ADMIN ONLY --}}
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ahliwaris.index') }}">Data Registrasi</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Data User</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Daftar Surat
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('perbulan.index') }}">Per-Bulan</a></li>
                                <li><a class="dropdown-item" href="{{ route('pertahun.index') }}">Per-Tahun</a></li>
                            </ul>
                        </li>
                    @endif

                    {{-- USER & ADMIN --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dataahliwaris.index') }}">Data Ahli Waris</a>
                    </li>

                </ul>  

                {{-- LOGOUT BUTTON --}}
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        Logout <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
</nav>
