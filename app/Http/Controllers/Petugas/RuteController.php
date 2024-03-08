<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Maskapai;
use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rute = Rute::with('maskapai')->latest()->get();
        return view('petugas.rute.index', compact('rute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        $maskapai = Maskapai::all();

        return view('petugas.rute.create', compact('kota','maskapai'));
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
            'maskapai_id' => 'required',
            'rute_asal' => 'required',
            'rute_tujuan' => 'required',
            'tanggal_pergi' => 'required',
        ]);

        Rute::create($credentials);

        return redirect('/petugas/rute')->with('success','Rute berhasil dibuat');
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
        $rute = Rute::find($id);
        $kota = Kota::all();
        $maskapai = Maskapai::all();
        return view('petugas.rute.edit', compact('rute','kota','maskapai'));
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
            'maskapai_id' => 'required',
            'rute_asal' => 'required',
            'rute_tujuan' => 'required',
            'tanggal_pergi' => 'required',
        ]);

        Rute::find($id)->update($credentials);

        return redirect('/petugas/rute')->with('success','Rute berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rute::find($id)->delete();

        return redirect('/petugas/rute')->with('success','Rute berhasil dihapus');
    }
}
