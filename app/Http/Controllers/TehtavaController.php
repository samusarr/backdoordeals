<?php

namespace App\Http\Controllers;

use App\Tehtava;
use Auth;
use Illuminate\Http\Request;

class TehtavaController extends Controller {

  public function list_all() {
    
    $kayttajaid = Auth::id();
    
    $PDO = \DB::connection('mysql')->getPdo();

    $sql = <<< SQLEND
    SELECT *
    FROM tehtava
    WHERE tarjous = 0
    AND kayttajaid != '$kayttajaid'
SQLEND;

    $allsql = $PDO->prepare($sql);
    $allsql->execute();
    $tehtava = $allsql->fetchAll((\PDO::FETCH_OBJ));

    return view('toimeksiannot')->with('tehtava', $tehtava);
      
  }

}