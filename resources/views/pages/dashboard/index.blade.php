@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
    <div class="container mt-1 d-flex justify-content-center">
        <div class="card text-center" style="max-width: 1000px;">
            <div class="card-body">
                <img class="rounded-circle" src="{{ asset('template/img/logo/logoesi.png') }}"
                    style="max-width: 150px; height: auto;">
                <h1 class="mt-2 fw-bold text-gray-800">
                    Player Recruitment E-Sport Divisi PUBG Mobile Jember
                </h1>
                <h5>
                    E-Sport Divisi PUBG Mobile Jember adalah komunitas di Jember yang bertujuan untuk mengembangkan bakat
                    para pemain PUBG Mobile, dikoordinasi oleh ESI Jember. ESI (Esports Indonesia) memiliki visi untuk
                    mengembangkan dan mempromosikan ekosistem esports yang stabil, serta membawa Indonesia menjadi pemimpin esports di
                    kawasan Asia. Misi ESI adalah mendorong pertumbuhan esports di Indonesia dengan menjadikannya sebagai pusat
                    esports paling aktif dan menarik di Asia.
                </h5>
            </div>
        </div>
    </div>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4"></div>

        <div class="row mb-3">
            <!-- Card 1: Total Kandidat Player -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Kandidat Player</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPlayers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-gamepad fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Kandidat Lolos Seleksi -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Kandidat Lolos Seleksi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lolosSeleksi }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-trophy fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Rata-rata KD Player -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Rata-rata KD Player</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($averageKD, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullseye fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4: Jumlah Admin -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Admin</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAdmin }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
