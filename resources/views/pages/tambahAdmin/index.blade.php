@extends('layouts.app')

@section('title', "Halaman Tambah Admin")

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <h3 class="text-dark">Data Akun</h3>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> {{-- Nomor otomatis --}}
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('tambahAdmin.destroy', $user->id) }}" method="POST"
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
                    <div class="card-footer">
                        <!-- Tombol Tambah Data -->
                        <a href="{{ route('tambahAdmin.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>

            </div>
        </div>
        <!--Row-->
    </div>
    <!---Container Fluid-->
@endsection
