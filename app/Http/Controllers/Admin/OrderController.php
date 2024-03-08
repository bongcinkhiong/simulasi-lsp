<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.konfirmasi.index', compact('order'));
    }

    public function riwayat()
    {
        $order = Order::where('acc','Diterima')->orWhere('acc','Ditolak')->get();
        // dd($order->order);
        return view('admin.konfirmasi.riwayat', compact('order'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terima(string $id)
    {
        $order = Order::find($id)->update(['acc' => 'Diterima']);
        return redirect('/admin/konfirmasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tolak(string $id)
    {
        $order = Order::find($id)->update(['acc' => 'Ditolak']);
        return redirect('/admin/konfirmasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hapus(string $id)
    {
        $order = Order::find($id)->delete();
        return redirect('/admin/konfirmasi/riwayat');
    }
}
