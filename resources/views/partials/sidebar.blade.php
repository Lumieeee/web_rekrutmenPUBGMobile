<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <!-- Logo Sidebar -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: #c11616" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('template/img/logo/logoesi.png') }}" style="max-width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">ESI Jember</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'active fw-bold' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Data Kandidat -->
    <li class="nav-item {{ request()->routeIs('dataPlayer.index') ? 'active fw-bold' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKandidat"
            aria-expanded="true" aria-controls="collapseKandidat">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Data Kandidat</span>
        </a>
        <div id="collapseKandidat" class="collapse {{ request()->routeIs('dataPlayer.index') ? 'show' : '' }}" aria-labelledby="headingKandidat" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Kandidat</h6>
                <a class="collapse-item {{ request()->routeIs('dataPlayer.index') ? 'fw-bold' : '' }}" href="{{ route('dataPlayer.index') }}">Tambah Pemain Baru</a>
            </div>
        </div>
    </li>

    <!-- Hasil Clustering -->
    <li class="nav-item {{ request()->routeIs('hasilClustering.index') ? 'active fw-bold' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClustering"
            aria-expanded="true" aria-controls="collapseClustering">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Hasil Clustering</span>
        </a>
        <div id="collapseClustering" class="collapse {{ request()->routeIs('hasilClustering.index') ? 'show' : '' }}" aria-labelledby="headingClustering" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Hasil Clustering</h6>
                <a class="collapse-item {{ request()->routeIs('hasilClustering.index') ? 'fw-bold' : '' }}" href="{{ route('hasilClustering.index') }}">Lihat Hasil Clustering</a>
            </div>
        </div>
    </li>

    <!-- Analisis & Prediksi -->
    <li class="nav-item {{ request()->routeIs('prediksiSVM.index') ? 'active fw-bold' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnalisis"
            aria-expanded="true" aria-controls="collapseAnalisis">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Analisis & Prediksi</span>
        </a>
        <div id="collapseAnalisis" class="collapse {{ request()->routeIs('prediksiSVM.index') ? 'show' : '' }}" aria-labelledby="headingAnalisis" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Analisis & Prediksi</h6>
                <a class="collapse-item {{ request()->routeIs('prediksiSVM.index') ? 'fw-bold' : '' }}" href="{{ route('prediksiSVM.index')}}">Hasil Prediksi</a>
            </div>
        </div>
    </li>

    <!-- Tambah Admin -->
    <li class="nav-item {{ request()->routeIs('tambahAdmin.index') ? 'active fw-bold' : '' }}">
        <a class="nav-link" href="{{ route('tambahAdmin.index') }}">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Tambah Admin</span>
        </a>
    </li>
</ul>
