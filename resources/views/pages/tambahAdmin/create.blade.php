@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content')
    <div class="container">
        <h3 class="mb-3">Tambah Admin</h3>
        <div class="card p-3">
            <form action="{{ route('tambahAdmin.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('tambahAdmin.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
