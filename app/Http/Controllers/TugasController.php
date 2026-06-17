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
            'judul' => 'required|string|max:255',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'deadline' => 'required|date',
            'status' => 'required',
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

    public function show(Tugas $tuga)
    {
        abort_if($tuga->user_id !== auth()->id(), 403);

        return view('tugas.show', [
            'tugas' => $tuga
        ]);
    }

    public function edit(Tugas $tuga)
    {
        abort_if($tuga->user_id !== auth()->id(), 403);

        $mataKuliah = MataKuliah::where(
            'user_id',
            auth()->id()
        )->get();

        return view('tugas.edit', [
            'tugas' => $tuga,
            'mataKuliah' => $mataKuliah
        ]);
    }

    public function update(Request $request, Tugas $tuga)
    {
        abort_if($tuga->user_id !== auth()->id(), 403);

        $request->validate([
            'judul' => 'required|string|max:255',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'deadline' => 'required|date',
            'status' => 'required',
        ]);

        $tuga->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'mata_kuliah_id' => $request->mata_kuliah_id,
        ]);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil diperbarui');
    }

    public function destroy(Tugas $tuga)
    {
        abort_if($tuga->user_id !== auth()->id(), 403);

        $tuga->delete();

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil dihapus');
    }
}