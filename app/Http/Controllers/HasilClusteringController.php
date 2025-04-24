<?php

namespace App\Http\Controllers;

use App\Models\HasilClustering;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\PlayersImport;

class HasilClusteringController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter filter dari URL
        $filterStatus = $request->get('status', 'all'); // Default 'all'

        $query = HasilClustering::query();

        if ($filterStatus === 'layak') {
            $query->where('cluster_status', 'Layak');
        } elseif ($filterStatus === 'tidak_layak') {
            $query->where('cluster_status', 'Tidak Layak');
        }

        // Jika ada pencarian, filter berdasarkan nama atau PUBG ID
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('pubg_id', 'LIKE', "%{$search}%");
        }

        // Gunakan paginate tanpa get()
        $hasilClustering = $query->paginate(10);

        return view('pages.hasilClustering.index', compact('hasilClustering', 'filterStatus'));
    }

    public function import(Request $request)
    {
        // Validasi file input
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        // Proses file dan import data clustering
        Excel::import(new PlayersImport, $request->file('file'));

        // Redirect setelah sukses
        return redirect()->route('hasilClustering.index')->with('success', 'Data hasil clustering berhasil diimpor!');
    }
}
