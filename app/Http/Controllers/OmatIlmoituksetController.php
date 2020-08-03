<?php

namespace App\Http\Controllers;

use App\OmatIlmoitukset;
use Auth;
use Illuminate\Http\Request;

class OmatIlmoituksetController extends Controller {
  
  public function omatilmoitukset() {
    
    $PDO = \DB::connection('mysql')->getPdo();
    $kayttajaid = Auth::id();  
    
    $sql = <<< SQLEND
    SELECT *
    FROM tehtava
    WHERE kayttajaid = '$kayttajaid'
    AND valmis = 0
SQLEND;

    $allsql = $PDO->prepare($sql);
    $allsql->execute();
    $tehtava = $allsql->fetchAll((\PDO::FETCH_OBJ));

    $sql = <<< SQLEND
    SELECT *
    FROM tehtava, tarjous
    WHERE tehtava.tehtavaid = tarjous.tehtavaid
    AND tarjous.kayttajaid = '$kayttajaid'
    AND tarjous.tarjoustila = 1
    AND tehtava.valmis = 0
SQLEND;
    
    $allsql = $PDO->prepare($sql);
    $allsql->execute();
    $hylatyt = $allsql->fetchAll((\PDO::FETCH_OBJ));  
    
    $sql = <<< SQLEND
    SELECT *
    FROM tehtava, tarjous
    WHERE tehtava.tehtavaid = tarjous.tehtavaid
    AND tarjous.kayttajaid = '$kayttajaid'
    AND tarjous.tarjoustila = 0
    AND tehtava.tarjous = 0
SQLEND;
    
    $allsql = $PDO->prepare($sql);
    $allsql->execute();
    $avoimet = $allsql->fetchAll((\PDO::FETCH_OBJ));
    
    $sql = <<< SQLEND
    SELECT *
    FROM tehtava, tarjous
    WHERE tehtava.tehtavaid = tarjous.tehtavaid
    AND tarjous.kayttajaid = '$kayttajaid'
    AND tarjous.tarjoustila = 0
    AND tehtava.tarjous = 1
    AND tehtava.valmis = 0
SQLEND;
    
    $allsql = $PDO->prepare($sql);
    $allsql->execute();
    $hyvaksytyt = $allsql->fetchAll((\PDO::FETCH_OBJ));
    
    return view('etusivu')->with('tehtava', $tehtava)->with('hylatyt', $hylatyt)->with('avoimet', $avoimet)->with('hyvaksytyt', $hyvaksytyt);
  }
  
}