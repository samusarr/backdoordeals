<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
//use App\Http\Controllers\Controller;
class PoistaIlmoitusController extends Controller {

public function destroy($tehtavaid) {
      DB::delete('delete from tehtava where tehtavaid = ?',[$tehtavaid]);
      echo "Toimeksianto poistettu onnistuneesti.<br/>";
      echo '<a href = "/etusivu">Palaa sivustolle</a>';
   }
}