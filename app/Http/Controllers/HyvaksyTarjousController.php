<?php

namespace App\Http\Controllers;
use App\HyvaksyTarjous;
use Auth;
use DB;
use Illuminate\Http\Request;

class HyvaksyTarjousController extends Controller {
  
  public function hyvaksytarjous(Request $request) {
    // Toimeksiantajan tiedot
    $kayttajaid = Auth::id();
    $credit = Auth::user()->credit;
    // Tarjouksen tekijan tiedot
    $tarjouksentekija = $request->input('tarjouksentekija');
    $tarjottusumma = $request->input('tarjottusumma');
    // Tarjouksen tiedot
    $tehtavaid = $request->input('tehtavaid');
    $tarjous1 = 1;
    $tarjous2 = 0;
    // Jos toimeksiantajalla on tarpeeksi credittejä hyväksyä tarjous
    if ($credit >= $tarjottusumma) {
      // Vähennetään toimeksiantajan crediteistä tarjottu summa
      $credit = $credit - $tarjottusumma;
      DB::table('kayttaja')->where('id', $kayttajaid)->update(['credit' => $credit]);
      // Hyväksytään tarjous
      DB::table('tehtava')->where('tehtavaid', $tehtavaid)->update(['tarjous' => $tarjous1]);
      // Hylätään kaikki muut tehtävään tehdyt tarjoukset
      DB::table('tarjous')->where('tehtavaid', $tehtavaid)->update(['tarjoustila' => $tarjous1]);
      DB::table('tarjous')->where('tehtavaid', $tehtavaid)->where('kayttajaid', $tarjouksentekija)->update(['tarjoustila' => $tarjous2]);
      echo 'Tarjous hyväksytty onnistuneesti.<br/>';
      echo '<a href = "/etusivu">Palaa sivustolle.</a>';
    } else {
      echo 'Tarjouksen hyväksyminen epäonnistui. Riittämätön määrä credittejä.<br/>';
      echo '<a href = "/credit">Osta credittejä.</a>';
    }
    
  }
  
}