<?php

namespace App\Http\Controllers;

use App\Arvio;
use DB;
use Illuminate\Http\Request;

class ArvioController extends Controller {

  public function nayta_arviot(Request $request) {
    
    // get kayttajaid
    $kayttajaid = $request->input('id');

    $arviot = DB::table('tehtava')
              ->join('tarjous', 'tehtava.tehtavaid', '=', 'tarjous.tehtavaid')
              ->where('tarjous.kayttajaid', $kayttajaid)
              ->where('tehtava.valmis', 1)
              ->where('tarjous.tarjoustila', 0)
              ->select('tehtava.*')
              ->get();
    
    $kuvaus = DB::table('kayttaja')->where('id', $kayttajaid)->select('kuvaus')->get();

    return view('arvio', ['arviot' => $arviot], ['kuvaus' => $kuvaus]);
      
  }

}