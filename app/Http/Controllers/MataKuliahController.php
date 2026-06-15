<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliah = MataKuliah::where(
            'user_id',
            auth()->id()
        )->latest()->get();

        return view(
            'matakuliah.index',
            compact('matakuliah')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'sks' => 'required|integer'
        ]);

        MataKuliah::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'sks' => $request->sks,
            'user_id' => auth()->id()
        ]);

        return back()->with(
            'success',
            'Mata kuliah berhasil ditambahkan'
        );
    }

    public function update(Request $request, MataKuliah $matakuliah)
    {
        $matakuliah->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'sks' => $request->sks,
        ]);

        return back();
    }

    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();

        return back();
    }
}