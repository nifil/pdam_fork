<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanggilanDinasController extends Controller
{
    public function index()
    {
        return view('master.panggilanDinas.index');
    }
}