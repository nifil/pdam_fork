<?php

namespace App\Http\Controllers;

use App\Models\Dip;
use App\Models\koreksiKorektor;
use Illuminate\Http\Request;
use App\Models\PetugasKorektor;
use App\Models\RandomPetugas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\DB;

class PetugasKorektorController extends Controller
{
    public function index()
    {
        $cS    = Dip::getData();
        $pKorektor = new PetugasKorektor();
        $korektor = $pKorektor->showKorektor();
        return view('master.petugasKorektor.index', compact('cS', 'korektor'))->with('i');
    }

    public function store(Request $request)
    {
        $getLast = new PetugasKorektor;
        $no = (int)$getLast->getLast()+1;
        $aktif = isset($request->aktif) ? 1 : 0;
        PetugasKorektor::insert([
            'nip'           => $request->nip,
            'jabatan'       => $request->jabatan,
            'userakses'     => Session::get('username'),
            'aktif'         => $aktif,
            'recid'         => $no

        ]);

        return redirect()->route('petugasKorektor.index');
    }

    public function update(Request $request, $recid)
    {
        $aktif = isset($request->aktif) ? 1 : 0;
        PetugasKorektor::where(DB::raw("REPLACE(recid,' ','')"), $recid)->update([
            'nip'       => $request->nipE,
            'jabatan'   => $request->jabatanE,
            'userakses' => Session::get('username'),
            'aktif'     => $aktif
        ]);

        return redirect()->route('petugasKorektor.index');
    }


    public function show($recid)
    {
        $petKorektor = PetugasKorektor::getByRecid($recid);
        return response()->json($petKorektor);
    }


    public function destroy($recid)
    {

        $pKorektor = PetugasKorektor::where('recid', $recid)->delete();
        return response()->json($pKorektor);
    }

    public function laporan()
    {
        $date = Carbon::now()->format('Y-m-d');
        $nip  = PetugasKorektor::getNipAndName();
        return view('master.petugasKorektor.laporan', compact('date', 'nip'))->with('i');
    }

    public function showLaporan(Request $request)
    {
        return response()->json($request->post());
    }

    public function viewsisa()
    {
        return view('master.petugasKorektor.viewsisa');
    }

    public function random()
    {
        $date   = Carbon::now()->format('Y-m-d');
        $random = RandomPetugas::all();
        return view('master.petugasKorektor.random', compact('date','random'))->with('i');
    }

    public function koreksi()
    {
        $cS    = Dip::getData();
        $Koreksi = new koreksiKorektor();
        $koreksi = $Koreksi->showKoreksi();
        return view('master.petugasKorektor.koreksi', compact('cS', 'koreksi'))->with('i');
    }




    public function viewpts()
    {
        $date   = Carbon::now()->format('Y-m-d');
        return view('master.petugasKorektor.viewpts', compact('date'))->with('i');
    }

    public function monitoring()
    {
        return view('master.petugasKorektor.monitoring');
    }
}
