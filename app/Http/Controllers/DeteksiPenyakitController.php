<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeteksiPenyakitController extends Controller
{
    public function index()
    {
        return view('desease');
    }
}
