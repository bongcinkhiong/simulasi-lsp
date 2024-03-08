<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Order;
use App\Models\Rute;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailRiwayat($id)
    {
        $tiket = Order::with('jadwal')->where('id',$id)->first();
        // dd($tiket);
        return view('pengguna.detailTiket',compact('tiket'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function konfirmasi(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'user_id' => 'required',
            'jadwal_id' => 'required',
            'jumlah_tiket' => 'required|numeric|min:1|max:50',
        ]);

        $jadwal = Jadwal::find($credentials['jadwal_id'])->first();
        // dd(date('Y-m-d'));
        $jumlah_tiket = $credentials['jumlah_tiket'];
        $total_harga = $credentials['jumlah_tiket'] * $jadwal->harga;
        $tanggal_transaksi = date('Y-m-d');

        return view('pengguna.konfirmasi',compact('jadwal','total_harga','tanggal_transaksi','jumlah_tiket'));
    }

    public function jadwal()
    {
        $rute = Rute::all();
        $rute_asal = request()->rute_asal;
        $rute_tujuan = request()->rute_tujuan;
        if(request()->rute_asal && request()->rute_tujuan){
            $jadwal = Jadwal::with('rute')->whereHas('rute', function ($query){
                return $query->where('rute_asal','=',request()->rute_asal)->where('rute_tujuan','=',request()->rute_tujuan);
            })->get();
        }elseif(request()->rute_asal){
            $jadwal = Jadwal::with('rute')->whereHas('rute', function ($query){
                return $query->where('rute_asal','=',request()->rute_asal);
            })->get();
        }elseif(request()->rute_tujuan){
            $jadwal = Jadwal::with('rute')->whereHas('rute', function ($query){
                return $query->where('rute_tujuan','=',request()->rute_tujuan);
            })->get();
        }else{
            $jadwal = Jadwal::with('rute')->latest()->get();
        }
        // dd(request()->rute);
        // $jadwal = $data->rute->with('maskapai')->whereHas('maskapai', function($query){
        //     return $query->where('nama_maskapai','=','Garudi');
        // })->get();
        // dd($jadwal->);
        // if(request()->cari){
        //     $jadwal->where('')
        // }

        // $jadwal->latest()->get();
        return view('pengguna.jadwal', compact('jadwal','rute','rute_asal','rute_tujuan'));
    }

    public function riwayat()
    {
        $data = User::where('id',Auth::user()->id)->with('order')->first();
        $order = $data->order;
        // dd($order->order);
        return view('pengguna.riwayat', compact('order'));
    }

    public function show(string $id)
    {
        $jadwal = Jadwal::with('rute')->find($id);
        return view('pengguna.detailJadwal', compact('jadwal'));
    }

    public function pesan(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'user_id' => 'required',
            'jadwal_id' => 'required',
            'total_harga' => 'required|numeric',
            'jumlah_tiket' => 'required|numeric|min:1|max:50',
        ]);

        $tiket = $request->validate([
            'tanggal_transaksi' => 'required',
        ]);

        // $orders = Order::with('tiket')->get();

        // $jadwal = Jadwal::find($credentials['jadwal_id'])->first();

        // dd($orders->tiket->where('id',1));
        // do{
            // $struk = random_bytes(10);
            $struk = random_int(1000000000,9000000000);
            // dd($struk);
        // }while($jadwal);
        // dd($credentials,$tiket['tanggal_transaksi']);
        $order = Order::create($credentials);
        $order->tiket()->create([
            'struk' => $struk,
            'tanggal_transaksi' => $tiket['tanggal_transaksi'],
        ]);

        return redirect('/pengguna/riwayat')->with('success','Pesanan anda Berhasil dibuat');
    }













    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
