<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use App\Models\Apartemen;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penghunis = Penghuni::all();
        return view('penghuni.index', compact('penghunis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartemens = Apartemen::all();
        return view('penghuni.create', compact('apartemens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'apartemen_id' => 'required|exists:apartemens,id',
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer',
            'status' => 'required|in:menikah,belum menikah',
        ]);

        $penghuni = Penghuni::create($validated);
        toast('Penghuni berhasil ditambahkan', 'success');
        return redirect()->route('penghuni.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penghuni $penghuni)
    {
        return view('penghuni.show', compact('penghuni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,)
    {
        $apartemens = Apartemen::all();
        $penghuni = Penghuni::findOrFail($id);
        return view('penghuni.edit', compact('penghuni', 'apartemens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'apartemen_id' => 'required|exists:apartemens,id',
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer',
            'status' => 'required|in:menikah,belum menikah',
        ]);
        $penghuni = Penghuni::findOrFail($id);
        $penghuni->update($validated);
        toast('Penghuni berhasil diupdate', 'success');
        return redirect()->route('penghuni.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $penghuni->delete();
        alert()->success('Success', 'Data apartemen dihapus');
        return redirect()->route('penghuni.index');
    }
}
