<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasKontrolController extends Controller
{
    public function index()
    {
        return view('master.petugasKontrol.index');
    }
}
