@extends('layouts.app')

@section('title', 'Edit Data Kandidat')

@section('content')
    <div class="container">
        <h3 class="mb-3">Edit Data Kandidat</h3>
        <div class="card p-3">
            <form action="{{ route('dataPlayer.update', $player->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="pubg_id">PUBG ID:</label>
                    <input type="text" name="pubg_id" class="form-control" value="{{ old('pubg_id', $player->pubg_id) }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $player->name) }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="kd">KD:</label>
                    <input type="text" name="kd" class="form-control" value="{{ old('kd', $player->kd) }}" required>
                </div>

                <div class="form-group">
                    <label for="win_ratio">Win Ratio (%):</label>
                    <input type="text" name="win_ratio" class="form-control"
                        value="{{ old('win_ratio', $player->win_ratio) }}" required>
                </div>

                <div class="form-group">
                    <label for="accuracy">Accuracy (%):</label>
                    <input type="text" name="accuracy" class="form-control"
                        value="{{ old('accuracy', $player->accuracy) }}" required>
                </div>

                <div class="form-group">
                    <label for="headshot_rate">Headshot Rate (%):</label>
                    <input type="text" name="headshot_rate" class="form-control"
                        value="{{ old('headshot_rate', $player->headshot_rate) }}" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('dataPlayer.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
