<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maskapai;
use Illuminate\Http\Request;

class MaskapaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maskapai = Maskapai::all();
        return view('admin.maskapai.index', compact('maskapai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maskapai.create');
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
            'nama_maskapai' => 'required',
            'logo_maskapai' => 'required',
            'kapasitas' => 'required|numeric|max:50|min:1',
        ]);

        $img = $credentials['logo_maskapai'];
        // dd($img->getClientOriginalName);
        $credentials['logo_maskapai'] = $img->getClientOriginalName();

        $img->move('storage/images',$img->getClientOriginalName());


        Maskapai::create($credentials);

        return redirect('/admin/maskapai')->with('success','Akun berhasil dibuat');
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
        $maskapai = Maskapai::find($id);
        return view('admin.maskapai.edit', compact('maskapai'));
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
            'nama_maskapai' => 'required',
            'logo_maskapai' => 'nullable',
            'kapasitas' => 'required|numeric|max:50|min:1',
        ]);

        if($request->hasFile('logo_maskapai')){

            $img = $credentials['logo_maskapai'];
            // dd($img->getClientOriginalName);
            $credentials['logo_maskapai'] = $img->getClientOriginalName();

            $img->move('storage/images',$img->getClientOriginalName());
        }


        Maskapai::find($id)->update($credentials);

        return redirect('/admin/maskapai')->with('success','Akun berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Maskapai::find($id)->delete();

        return redirect('/admin/maskapai')->with('success','Akun berhasil dihapus');
    }
}
