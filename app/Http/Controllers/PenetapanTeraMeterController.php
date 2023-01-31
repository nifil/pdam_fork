<?php

namespace App\Http\Controllers;

use App\Models\Bonc;
use App\Models\PenetapanTeraMeter;
use App\Models\Pengaduan;
use App\Models\PetugasCS;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenetapanTeraMeterController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->format('Y-m-d');
        $getlast = new PenetapanTeraMeter;
        $no = (int)$getlast->getLast()+1;
        $getByBonc = new Bonc;
        $petcs = PetugasCS::getData();
        $bonc = $getByBonc->getByBonc('BCL-95');
        $getUkuran = new PenetapanTeraMeter;
        return view('master.penetapanTeraMeter.index', compact('date', 'getlast', 'no', 'petcs'))->with('i');
    }

    public function store(Request $request)
    {
        PenetapanTeraMeter::insert([
            'no_tera'           => $request->no_tera,
            'tgl_tera'          => $request->date,
            'no_bonc'           => $request->no_bonc,
            'uk_meter'          => $request->ukuran_mtr,
            'biaya_tera'        => $request->biaya_tera,
            'total_biaya'       => $request->total_biaya,
            'nama_pengadu'      => $request->nama_pengadu,
            'alamat_pengadu'    => $request->alamat_pengadu,
            'telp_pengadu'      => $request->telp_pengadu
        ]);

        return redirect()->route('penetapanTeraMeter');
    }

    public function show($no_bonc)
    {
        $getByBonc = Bonc::getByBonc($no_bonc);

        // var_dump($getByBonc);
        // $penetapanTeraMeter = PenetapanTeraMeter::select('no_plg', 'nama', 'alamat', 'kd_tarif', 'ukuran_mtr', 'biaya_tera', 'total_biaya')
        //                                 ->where('no_bonc', $no_bonc)
        //                                 ->first();
        return response()->json($getByBonc);
    }

    public function printPreview(Request $request)
    {
        $date = Carbon::now()->format('d-m-Y');
        $query  = PetugasCS::getData();
        $cetak = PenetapanTeraMeter::getCetak($request->no_tera);
        $data = array(
            'no_tera'   => $request->no_tera,
            'petcs'     => $request->petcs,
            'query'     => $query,
            'cetak'     => $cetak
        );
        //dd($data['cetak'][0]);
        return view('master.penetapanTeraMeter.print', compact('data', 'date'))->with('i');
    }

    public function cetak(Request $request)
    {
        $date = Carbon::now()->format('d-M-Y');
        $query  = PetugasCS::getData();
        $cetak = PenetapanTeraMeter::getCetak($request->no_tera);
        $data = array(
            'no_tera'   => $request->no_tera,
            'petcs'     => $request->petcs,
            'query'     => $query,
            'cetak'     => $cetak
        );
        // $petcs  = PetugasCS::getData();
        return view('master.penetapanTeraMeter.cetak', compact('data', 'date'))->with('i');
    }

}
