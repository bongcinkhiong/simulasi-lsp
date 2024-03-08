<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.pengguna.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengguna.create');
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
            'nama_lengkap' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        User::create($credentials);

        return redirect('/admin/pengguna')->with('success','Akun berhasil dibuat');
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
        $user = User::find($id);
        return view('admin.pengguna.edit', compact('user'));
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
            'nama_lengkap' => 'required',
            'username' => 'required',
            'password' => 'nullable ',
            'role' => 'required',
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        User::find($id)->update($credentials);

        return redirect('/admin/pengguna')->with('success','Akun berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('/admin/pengguna')->with('success','Akun berhasil dihapus');
    }
}
