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

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa,nim,'.$id,
            'jurusan' => 'required',
        ]);

        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
        ]);

        return redirect('/mahasiswa');
    }
    public function destroy($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);

    $mahasiswa->delete();

    return redirect('/mahasiswa');
}
}