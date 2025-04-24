<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PlayersImport;
use Illuminate\Support\Facades\Session;

class ImportPlayerController extends Controller
{
    public function showImportForm()
    {
        return view('pages.dataPlayer.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new PlayersImport, $request->file('file'));

        return redirect()->route('dataPlayer.index')->with('success', 'Data pemain berhasil diimpor!');
    }
}
