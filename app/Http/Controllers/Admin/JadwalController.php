<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Rute;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::with('rute')->latest()->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rute = Rute::all();
        return view('admin.jadwal.create', compact('rute'));
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
            'rute_id' => 'required',
            'waktu_berangkat' => 'required',
            'waktu_tiba' => 'required',
            'harga' => 'required',
        ]);
        Jadwal::create($credentials);
        // dd($credentials);

        return redirect('/admin/jadwal')->with('success','jadwal berhasil dibuat');
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
        $jadwal = Jadwal::find($id);
        $rute = Rute::all();
        return view('admin.jadwal.edit', compact('jadwal','rute'));
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
            'rute_id' => 'required',
            'waktu_berangkat' => 'required',
            'waktu_tiba' => 'required',
            'harga' => 'required',
        ]);

        Jadwal::find($id)->update($credentials);

        return redirect('/admin/jadwal')->with('success','jadwal berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::find($id)->delete();

        return redirect('/admin/jadwal')->with('success','jadwal berhasil dihapus');
    }
}
