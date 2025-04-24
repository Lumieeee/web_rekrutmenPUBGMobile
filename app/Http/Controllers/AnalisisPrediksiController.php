<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\player;

class AnalisisPrediksiController extends Controller
{
    public function index()
    {
        $candidate_players = player::where('prediction_status', 'Belum Diprediksi')->paginate(10);
        return view('pages.prediksiSvm.index', compact('candidate_players'));
    }

    public function prediksi($id)
    {
        $player = player::findOrFail($id);

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->post('http://127.0.0.1:5000/predict', [
                'json' => [
                    'kd' => $player->kd,
                    'win_ratio' => $player->win_ratio,
                    'accuracy' => $player->accuracy,
                    'headshot_rate' => $player->headshot_rate,
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            $hasil = $data['hasil'];

            $player->prediction_status = $hasil;
            $player->save();

            return response()->json([
                'hasil' => $hasil,
                'nama' => $player->name,
                'kd'   => $player->kd,
                'confidence' => $data['confidence'] ?? null,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal menghubungi model Flask.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

}
