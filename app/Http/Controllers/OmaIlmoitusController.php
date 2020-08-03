<?php

namespace App\Http\Controllers;

use App\OmaIlmoitus;
use DB;
use Auth;
use Illuminate\Http\Request;

class OmaIlmoitusController extends Controller {

  public function naytailmoitus(Request $request) {
    
    $kayttajaid = Auth::id();
    $ilmoitus = $request->input('id');
    $ilmoitusinfo['ilmoitusinfo'] = DB::table('tehtava')->where('tehtavaid', $ilmoitus)->first();
    $PDO = \DB::connection('mysql')->getPdo();

	$sql = <<< SQLEND
	SELECT *
	FROM tarjous
    WHERE tehtavaid = $ilmoitus
    AND tarjoustila = 0
SQLEND;

	$allsql = $PDO->prepare($sql);
	$allsql->execute();
	$tarjousinfo = $allsql->fetchAll((\PDO::FETCH_OBJ));

    return view('omailmoitus')->with(array('ilmoitusinfo'=>$ilmoitusinfo, 'tarjousinfo'=>$tarjousinfo)); 
    
  }

}