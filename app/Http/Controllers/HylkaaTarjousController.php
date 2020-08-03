<?php

namespace App\Http\Controllers;
use App\HylkaaTarjous;
use Auth;
use DB;
use Illuminate\Http\Request;

class HylkaaTarjousController extends Controller {
  
  public function hylkaatarjous(Request $request) {
    
    $tehtavaid = $request->input('tehtavaid');
    $tarjoustila = 1;
    
    DB::table('tarjous')->where('tehtavaid', $tehtavaid)->update(['tarjoustila' => $tarjoustila]);
    echo 'Tarjous hylätty onnistuneesti.<br/>';
    echo '<a href = "/etusivu">Palaa sivustolle.</a>';
  }

}