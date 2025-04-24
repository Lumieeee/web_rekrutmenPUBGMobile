@extends('layouts.app')

@section('title', 'Halaman Data Kandidat')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <h3 class="text-dark">Data Kandidat</h3>
                <!-- Pencarian dan Tombol Tambah Data -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <form method="GET" action="{{ route('dataPlayer.index') }}">
                        <input type="text" name="search" id="searchInput" class="form-control"
                            placeholder="Cari Nama atau PUBG ID" style="background-color: #dadada; width: 250px;"
                            value="{{ request('search') }}">
                    </form>

                    <a href="{{ route('dataPlayer.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>

                <script>
                    document.getElementById('searchInput').addEventListener('input', function() {
                        clearTimeout(this.searchTimer); // Menghindari request terlalu sering
                        this.searchTimer = setTimeout(() => {
                            this.form.submit();
                        }, 500); // Tunggu 500ms sebelum mengirim permintaan
                    });
                </script>

                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>PUBG ID</th>
                                    <th>Nama</th>
                                    <th>KD</th>
                                    <th>Win Ratio</th>
                                    <th>Accuracy</th>
                                    <th>Headshot Rate</th>
                                    <th>Status Prediksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $player)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> {{-- Nomor otomatis --}}
                                        <td>{{ $player->pubg_id }}</td>
                                        <td>{{ $player->name }}</td>
                                        <td>{{ $player->kd }}</td>
                                        <td>{{ $player->win_ratio }}%</td>
                                        <td>{{ $player->accuracy }}%</td>
                                        <td>{{ $player->headshot_rate }}%</td>
                                        <td>{{ $player->prediction_status }}</td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('dataPlayer.edit', $player->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('dataPlayer.destroy', $player->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Laravel -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            {{ $players->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>
    <!---Container Fluid-->
@endsection
