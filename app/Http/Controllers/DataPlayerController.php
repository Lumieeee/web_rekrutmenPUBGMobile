<?php

namespace App\Http\Controllers;
use App\Models\player;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DataPlayerController extends Controller
{
    public function index(Request $request)
    {
        $query = player::query();

        $search = $request->input('search');

        // Query untuk mencari berdasarkan nama atau PUBG ID
        $players = player::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('pubg_id', 'like', "%{$search}%");
        })->paginate(10); // Pagination untuk hasil pencarian

        return view('pages.dataPlayer.index', compact('players', 'search'));
    }

    public function create()
    {
        return view('pages.dataPlayer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pubg_id' => 'required|string|unique:pubg_players,pubg_id',
            'name' => 'required|string|max:255',
            'kd' => 'required|numeric',
            'win_ratio' => 'required|numeric',
            'accuracy' => 'required|numeric',
            'headshot_rate' => 'required|numeric',
        ]);

        player::create($request->all());

        return redirect()->route('dataPlayer.index')->with('success', 'Data pemain berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $player = player::findOrFail($id);
        return view('pages.dataPlayer.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pubg_id' => 'required|string|unique:pubg_players,pubg_id,' . $id,
            'name' => 'required|string|max:255',
            'kd' => 'required|numeric',
            'win_ratio' => 'required|numeric',
            'accuracy' => 'required|numeric',
            'headshot_rate' => 'required|numeric',
        ]);

        $player = player::findOrFail($id);

        // Cek apakah ada perubahan pada fitur penting
        $needReset =
        $player->kd != $request->kd ||
        $player->win_ratio != $request->win_ratio ||
        $player->accuracy != $request->accuracy ||
        $player->headshot_rate != $request->headshot_rate;

        $player->update([
            'pubg_id' => $request->pubg_id,
            'name' => $request->name,
            'kd' => $request->kd,
            'win_ratio' => $request->win_ratio,
            'accuracy' => $request->accuracy,
            'headshot_rate' => $request->headshot_rate,
            // Reset status prediksi jika perlu
            'prediction_status' => $needReset ? 'Belum Diprediksi' : $player->prediction_status,
        ]);


        return redirect()->route('dataPlayer.index')->with('success', 'Data pemain berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $player = player::findOrFail($id);
        $player->delete();

        return redirect()->route('dataPlayer.index')->with('success', 'Data pemain berhasil dihapus!');
    }
}

