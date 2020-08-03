<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnnaPalauteController extends Controller {

  public function annapalaute(Request $request) {
    // get tehtavaid
    $tehtava = $request->input('id');
    // get tarjous
    $tarjoukset = DB::table('tarjous')
              ->where('tehtavaid', $tehtava)
              ->where('tarjoustila', 0)
              ->select('*')
              ->get();
    // get tekijan kreditit
    $kayttajakredits = DB::table('kayttaja')
              ->join('tarjous', 'kayttaja.id', '=', 'tarjous.kayttajaid')
              ->where('tarjous.tehtavaid', $tehtava)
              ->where('tarjoustila', 0)
              ->select('kayttaja.*')
              ->get();
    // return view
    return view('palaute', ['tarjoukset' => $tarjoukset], ['kayttajakredits' => $kayttajakredits]); 
  }
  
  public function lahetapalaute(Request $request) {
    
    // get tehtavaid    
    $tehtavaid = $request->input('tehtavaid');
    // get tekija
    $tekija = $request->input('kayttajaid');
    // get tehtavan hinta
    $hinta = $request->input('hinta');
    // kayttajan kreditit
    $tekijanrahat = $request->input('kredits');
    // tekijan rahojen uusi summa
    $maksu = $tekijanrahat + $hinta;
    // arvosana
    $arvosana = $request->input('arvio');
    // palaute
    $palaute = $request->input('palaute');
    // tehtavan merkinta
    $valmis = 1;
    // tekijalle maksaminen
    DB::table('kayttaja')->where('id', $tekija)->update(['credit' => $maksu]);
    // tehtavan valmiiksi merkitseminen
    DB::table('tehtava')->where('tehtavaid', $tehtavaid)->update(['valmis' => $valmis]);
    // arvosanan merkinta tehtavaan
    DB::table('tehtava')->where('tehtavaid', $tehtavaid)->update(['arvostelutahdet' => $arvosana]);
    // palautteen merkinta tehtavaan
    DB::table('tehtava')->where('tehtavaid', $tehtavaid)->update(['arvosteluteksti' => $palaute]);
    echo 'Palaute annettu onnistuneesti.<br/>';
    echo '<a href = "/etusivu">Palaa sivustolle.</a>';

    }

}