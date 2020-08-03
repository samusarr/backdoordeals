<?php
namespace App\Http\Controllers;
use App\Credit;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;

class CreditController extends Controller {

  public function naytaCredit() {
    return view('credit');
  } 

  public function lisaaCredit(Request $request) {
    // get id
    $kayttajaid = Auth::id();
    
    $credit = $request->input('credit') + Auth::user()->credit;
    DB::table('kayttaja')->where('id', $kayttajaid)->update(['credit' => $credit]);
    echo 'Creditit lisätty onnistuneesti.<br/>';
    echo '<a href = "/etusivu">Palaa sivustolle.</a>';
  }
}