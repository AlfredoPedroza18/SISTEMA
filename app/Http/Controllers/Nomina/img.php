<?php
namespace App\Http\Controllers\Nomina;
use DB;
class img
{

  function mostrar($id=''){
     $datos=DB::select("select m.Logotipo from master_empresa as m where m.IdEmpresa = {$id} limit 1");
     foreach ($datos as $d) {
            header("Content-type: image/jpg");
            echo  $d->Logotipo;
     }
  }
}


 ?>
