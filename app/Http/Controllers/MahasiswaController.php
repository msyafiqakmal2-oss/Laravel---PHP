<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', compact('mahasiswa'));
    }
    public function create()
{
    return view('mahasiswa.create');
}
public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nim' => 'required|unique:mahasiswa,nim',
        'jurusan' => 'required',
    ]);

    Mahasiswa::create([
        'nama' => $request->nama,
        'nim' => $request->nim,
        'jurusan' => $request->jurusan,
    ]);

    return redirect('/mahasiswa');
}
}