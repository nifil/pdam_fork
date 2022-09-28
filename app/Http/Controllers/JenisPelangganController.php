<?php

namespace App\Http\Controllers;

use App\Models\JenisPelanggan;
use Illuminate\Http\Request;

class JenisPelangganController extends Controller
{
    public function index()
    {
        $jenisPelanggans = JenisPelanggan::all();
        return view('master.jenisPelanggan.index', compact('jenisPelanggans'))->with('i');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jns_pelanggan' => 'required|max:255',
            'keterangan'    => 'required'
        ]);

        JenisPelanggan::insert([
            'jns_pelanggan' => $request->jns_pelanggan,
            'keterangan'    => $request->keterangan,
            'jns_rekswasta' => "S"
        ]);

        return redirect()->route('jenisPelanggan.index');
    }

    public function show($id)
    {
        $jenisPelanggan = JenisPelanggan::find($id);

        return response()->json($jenisPelanggan);
    }

    public function destroy($jns_pelanggan)
    {
        JenisPelanggan::where('jns_pelanggan', $jns_pelanggan)->delete();

        return redirect()->route('jenisPelanggan.index');
    }
}
