<?php
namespace App\Http\Controllers;
use App\Ilmoitus;
use Auth;
use DB;
use Illuminate\Http\Request;

class IlmoitusController extends Controller {
    
  public function form() {
    return view('ilmoitus');
  } 

  public function create(Request $request) {
    $kayttajaid = Auth::id();    
    $aihe = $request->input('aihe');
    $aihealue = $request->input('aihealue');
    $arvosanatavoite = $request->input('arvosanatavoite');
    $pvm = $request->input('pvm');
    $aika = $request->input('aika');
    $deadline = $pvm. ' ' .$aika;  
    $ilmoituspvm = now();    
    $tehtavananto = $request->input('tehtavananto');
    $arvostelutahti = 0; 
    $arvosteluteksti = " "; 
    $tarjous = 0;
    $valmis = 0;

    $data=array("kayttajaid"=>$kayttajaid, "aihe"=>$aihe,"aihealue"=>$aihealue,"arvosanatavoite"=>$arvosanatavoite,"deadline"=>$deadline, "ilmoituspvm"=>$ilmoituspvm, "tehtavananto"=>$tehtavananto, "arvostelutahdet" => $arvostelutahti, "arvosteluteksti" => $arvosteluteksti, "tarjous" => $tarjous, "valmis"=>$valmis);

    DB::table('tehtava')->insert($data);
    echo "Toimeksianto julkaistu onnistuneesti.<br/>";
    echo '<a href = "/toimeksiannot">Palaa sivustolle.</a>';
  }
  
}