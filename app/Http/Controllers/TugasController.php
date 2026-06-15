<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with('mataKuliah')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('tugas.index', compact('tugas'));
    }

    public function create()
    {
        $mataKuliah = MataKuliah::where(
            'user_id',
            auth()->id()
        )->get();

        return view('tugas.create', compact('mataKuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'mata_kuliah_id' => 'required',
            'deadline' => 'required|date',
        ]);

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil ditambahkan');
    }

    public function destroy(Tugas $tuga)
    {
        $tuga->delete();

        return back();
    }
}