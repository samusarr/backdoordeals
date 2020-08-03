<?php
namespace App\Http\Controllers;
use App\OmatTiedot;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;

class OmatTiedotController extends Controller {

  public function naytatiedot() {
    return view('omattiedot');
  } 

  public function paivitatiedot(Request $request) {
    // if old password doesn't match
    if (!(Hash::check($request->get('vanhasalasana'), Auth::user()->salasana))) {
      return redirect()->back()->with("error","Väärä vanha salasana!");
    }
    // if new password is same as old password
    if (strcmp($request->get('vanhasalasana'), $request->get('uusisalasana')) == 0) {
      return redirect()->back()->with("error","Uusi salasana ei voi olla sama kuin vanha salasana!");
    }
    // validate data
    $validatedData = $request->validate([
      'vanhasalasana' => 'required',
    ]);
    // get id
    $kayttajaid = Auth::id();
    // if email has changed
    if ($request->input('email') != Auth::user()->email) {
      // get new email
      $email = $request->input('email');
      // update database
      DB::table('kayttaja')->where('id', $kayttajaid)->update(['email' => $email]);
    }
    // if new password is given
    if ($request->input('uusisalasana1') != null && $request->input('uusisalasana2') != null) {
      // if both inputs match
      if ($request->input('uusisalasana2') == $request->input('uusisalasana1')) {
        // get and hash new password
        $salasana = bcrypt($request->input('uusisalasana1'));
        // update database
        DB::table('kayttaja')->where('id', $kayttajaid)->update(['salasana' => $salasana]);
      } else {
        return redirect()->back()->with("error", "Syöttämäsi salasanat eivät täsmänneet!");
      }
    }
    // if kuvaus has changed
    if ($request->input('kuvaus') != Auth::user()->kuvaus) {
      // get new kuvaus
      $kuvaus = $request->input('kuvaus');
      // update database
      DB::table('kayttaja')->where('id', $kayttajaid)->update(['kuvaus' => $kuvaus]);
    }
    // if data was updated
    if ($request->input('email') != Auth::user()->email || $request->input('uusisalasana1') != null && $request->input('uusisalasana2') != null && $request->input('uusisalasana2') == $request->input('uusisalasana1') || $request->input('kuvaus') != Auth::user()->kuvaus) {
      echo 'Omat tiedot päivitetty onnistuneesti.<br/>';
      echo '<a href = "/omattiedot">Palaa sivustolle.</a>';
    }
  }
  
}