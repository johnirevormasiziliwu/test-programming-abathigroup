<?php

namespace App\Http\Controllers;

use App\Models\Apartemen;
use Illuminate\Http\Request;

class ApartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartemens = Apartemen::all();
        return view('apartemen.index', compact('apartemens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apartemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nomor_apartemen' => 'required|unique:apartemens,nomor_apartemen',
            'lantai_apartemen' => 'required',
            'status' => 'required',
        ]);

        Apartemen::create($validate);
        toast('Data Apartemen Ditambahkan', 'success');
        return redirect()->route('apartemen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $apartemen = Apartemen::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $apartemen = Apartemen::findOrFail($id);
        return view('apartemen.edit', compact('apartemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validate = $request->validate([
            'nomor_apartemen' => 'required',
            'lantai_apartemen' => 'required',
            'status' => 'required',
        ]);
        $apartemen = Apartemen::findOrFail($id);
        $apartemen->update($validate);

        toast(' Data Apartemen Diupdate', 'success');
        return redirect()->route('apartemen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $apartemen = Apartemen::findOrFail($id);
        $apartemen->delete();
        alert()->success('Success', 'Data apartemen dihapus');
        return redirect()->route('apartemen.index');
    }
}
