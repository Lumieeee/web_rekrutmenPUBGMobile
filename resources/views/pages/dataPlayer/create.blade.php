@extends('layouts.app')

@section('title', 'Tambah Data Player')

@section('content')
<div class="container">
    <h2>Tambah Data Player</h2>
    <form action="{{ route('dataPlayer.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>PUBG ID</label>
            <input type="text" name="pubg_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>KD</label>
            <input type="number" name="kd" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label>Win Ratio (%)</label>
            <input type="number" name="win_ratio" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label>Accuracy (%)</label>
            <input type="number" name="accuracy" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label>Headshot Rate (%)</label>
            <input type="number" name="headshot_rate" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
