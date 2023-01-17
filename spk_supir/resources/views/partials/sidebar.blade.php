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
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Data Master</li>
            <li><a class="nav-link" href="/periode"><i class="far fa-newspaper"></i></i><span>Periode</span></a></li>
            @if (auth()->user()->is_admin == 0)
                <li><a class="nav-link" href="/supir"><i class="fas fa-truck fa-flip-horizontal"></i>
                        <span>Supir</span></a></li>
            @endif
            @can('sadmin')
                <li><a class="nav-link" href="/kriteria"><i class="fas fa-clipboard-list"></i> <span>Kriteria</span></a>
                </li>
                <li><a class="nav-link" href="/user"><i class="fas fa-users"></i> <span>User</span></a></li>
            @endcan
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Penilaian</li>
            <li><a class="nav-link" href="/penilaian"><i class="fas fa-tasks"></i> <span>Penilaian</span></a>
            </li>
            @can('sadmin')
                <li><a class="nav-link" href="/perhitungan"><i class="fas fa-calculator"></i><span>Perhitungan</span></a>
                </li>
            @endcan
        </ul>
    </aside>
</div>
