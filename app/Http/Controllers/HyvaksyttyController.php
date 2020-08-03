<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HyvaksyttyController extends Controller {

  public function naytatehtava(Request $request) {
    $kayttajaid = Auth::id();
    // get 'tehtavaid'
    $tehtava = $request->input('id');
	// get 'tehtavainfo' from database
    $tehtavainfo['tehtavainfo'] = DB::table('tehtava')->where('tehtavaid', $tehtava)->get();
    // get email
    $kayttajat = DB::table('kayttaja')
              ->join('tehtava', 'kayttaja.id', '=', 'tehtava.kayttajaid')
              ->where('tehtava.tehtavaid', $tehtava)
              ->select('kayttaja.*')
              ->get();
    // return view
    return view('tehtavat', $tehtavainfo, ['kayttajat' => $kayttajat]); 
  }
  
}