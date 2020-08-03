<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TarjousController extends Controller {

  public function naytatehtava(Request $request) {
    $kayttajaid = Auth::id();
    // get 'tehtavaid'
    $tehtava = $request->input('id');
	// get 'tehtavainfo' from database
    $tehtavainfo['tehtavainfo'] = DB::table('tehtava')->where('tehtavaid', $tehtava)->get();
    // return view
    return view('tarjous', $tehtavainfo); 
  }
  
  public function teetarjous(Request $request) {
    
    $tehtavaid = $request->input('tehtavaid');
    $kayttajaid = Auth::id();    
    $tarjous = $request->input('tarjous');
    $tarjouspvm = now();
    $tarjoustila = 0;
          
    $data=array("tehtavaid"=>$tehtavaid,"kayttajaid"=>$kayttajaid, "tarjous"=>$tarjous,"tarjouspvm"=>$tarjouspvm,"tarjoustila"=>$tarjoustila,);
        
    DB::table('tarjous')->insert($data);
    echo "Tarjous tehty onnistuneesti.<br/>";
    echo '<a href = "/toimeksiannot">Palaa sivustolle</a>';

    }

}