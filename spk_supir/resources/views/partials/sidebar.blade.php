<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <strong>
                Buwaran Transportation
            </strong>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('assets/img/icon_truk.png') }}" alt="logo" width="50" class="rounded-circle">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="/"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            <li><a class="nav-link" href="/periode"><i class="fas fa-clipboard-list"></i><span>Periode</span></a></li>
            <li><a class="nav-link" href="/supir"><i class="fas fa-truck"></i> <span>Data Supir</span></a></li>
            @can('sadmin')
                <li><a class="nav-link" href="/kriteria"><i class="fas fa-clipboard-list"></i> <span>Kriteria</span></a>
                </li>
                <li><a class="nav-link" href="/penilaian"><i class="fas fa-clipboard-list"></i> <span>Penilaian</span></a>
                </li>
                <li><a class="nav-link" href="/perhitungan"><i
                            class="fas fa-clipboard-list"></i><span>Perhitungan</span></a></li>
                <li><a class="nav-link" href="/user"><i class="fas fa-users"></i> <span>User</span></a></li>
            @endcan
            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="/kriteria">Kriteria</a></li>
                    <li class="active"><a class="nav-link" href="">Bobot</a></li>
                </ul>
            </li> --}}

        </ul>
    </aside>
</div>
