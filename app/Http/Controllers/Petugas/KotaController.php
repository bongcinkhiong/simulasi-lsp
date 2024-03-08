<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kota = Kota::all();
        return view('petugas.kota.index', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.kota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'nama_kota' => 'required',
        ]);

        kota::create($credentials);

        return redirect('/petugas/kota')->with('success','kota berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kota::find($id);
        return view('petugas.kota.edit', compact('kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credentials = $request->validate([
            'nama_kota' => 'required',
        ]);

        Kota::find($id)->update($credentials);

        return redirect('/petugas/kota')->with('success','kota berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kota::find($id)->delete();

        return redirect('/petugas/kota')->with('success','kota berhasil dihapus');
    }
}
