<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <strong>
                Buwaran Transportation
            </strong>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('assets/img/icon_truk.png') }}" alt="logo" width="50"
                class="rounded-circle">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="/dashboard"><i class="fas fa-users"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Laporan</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="layout-default.html">Default Layout</a>
                    </li>
                    <li class="active"><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li class="active"><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            @can('sadmin')
                <li><a class="nav-link" href="/user"><i class="fas fa-users"></i> <span>User</span></a></li>
            @endcan
        </ul>
    </aside>
</div>
