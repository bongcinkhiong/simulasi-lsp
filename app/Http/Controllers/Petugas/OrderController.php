<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('acc','Proses')->get();
        return view('petugas.konfirmasi.index', compact('order'));
    }

    public function riwayat()
    {
        $order = Order::all();
        // dd($order->order);
        return view('petugas.konfirmasi.riwayat', compact('order'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terima(string $id)
    {
        $order = Order::find($id)->update(['acc' => 'Diterima']);
        return redirect('/petugas/konfirmasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tolak(string $id)
    {
        $order = Order::find($id)->update(['acc' => 'Ditolak']);
        return redirect('/petugas/konfirmasi');
    }

}
