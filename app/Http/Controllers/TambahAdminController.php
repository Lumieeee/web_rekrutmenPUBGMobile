<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TambahAdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ambil semua data dari tabel players
        return view('pages.tambahAdmin.index', compact('users'));
    }

    public function create()
    {
        return view('pages.tambahAdmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing password
        ]);

        return redirect()->route('tambahAdmin.index')->with('success', 'Akun berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('tambahAdmin.index')->with('success', 'Data akun berhasil dihapus!');
    }
}
