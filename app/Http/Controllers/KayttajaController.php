<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Kayttaja;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KayttajaController extends Controller
{

    public function list_all()
    {
        $kayttajat = Kayttaja::All();
        return view('kayttajat')->with('kayttajat', $kayttajat);
    }

}