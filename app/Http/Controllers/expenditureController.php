<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenditure;
use App\Models\Coowner;
use App\Models\Residence;
use App\Models\Month;
use App\Models\TypeMoney;

class expenditureController extends Controller
{
    public function index()
    {
    	  $coowner = Coowner::all();
        $residence = Residence::all();
 
        return view('expenditure.index', compact('coowner', 'residence'));
    }

    public function store(Request $request, $obj) 
    {   

      //

    }

    public function create()
    {
    	$expenditure = Expenditure::all();
    	$coowner = Coowner::all();
      $month = Month::all();
      $typeMoney = TypeMoney::all();
      $residence = Residence::all();

    	return view('expenditure.store', compact('expenditure', 'coowner', 'month', 'typeMoney', 'residence'));

    }

    public function searchClient (Request $request) 
    {
        $id = $request->residence_coowner;
        $result = Residence::where('id', $id)->get();
       
        if (isset($result)) 
        {

            foreach($result as $resultado) 
            {
              if ($resultado->type_center == 'on') {
                $resultado->type_center = 'Central';
              }
              if ($resultado->type_corner == 'on') {
                $resultado->type_corner = 'Esquina';
              }
              if ($resultado->type_penhouse == 'on') {
                $resultado->type_penhouse = 'Pen House';
              }
           		echo '
                    <div class="card">
                     <div class="card-header text-white aqua-gradient text-center">
                        <h6>
                            <b><i class="fas fa-building fa-md font-weight-bold" title="Residencia."></i> <b>Información Residencial</b>
                        </h6>
                    </div>
                      <div class="card-body">
                      <div class="row">
                          <div class="col-md-6 pb-4">   
                            <label for="number_rif_residence"><b>RIF:</b></label>
                              <input type="text" disabled class="form-control" id="number_rif_residence" name="number_rif_residence" value="J-'.$resultado->number_rif.'">
                          </div>
                          <div class="col-md-6 pb-4">   
                            <label for="type_residence_coowner"><b>Tipo de Residencia:</b></label>
                              <input type="text" disabled class="form-control" id="type_residence_coowner" name="type_residence_coowner" value="'.$resultado->typeResidences->option.'">
                          </div>
                          <div class="col-md-6 pb-4">   
                            <label for="addres_residence"><b>Dirección:</b></label>
                              <input type="text" disabled class="form-control" id="addres_residence" name="addres_residence" value="'.$resultado->addres.'">
                          </div>
                          <div class="col-md-6 pb-4">   
                            <label for="type_center_exp"><b>Estructura - Tipo 1:</b></label>
                              <input type="text" disabled class="form-control font-weight-bold" style="Color:#1babed;" id="type_center_exp" name="type_center_exp" value="'.$resultado->type_center.'">
                          </div>

                          <div class="col-md-6 pb-4">   
                            <label for="type_corner_exp"><b>Estructura - Tipo 2:</b></label>
                              <input type="text" disabled class="form-control font-weight-bold" style="Color:#1babed; id="type_corner_exp" name="type_corner_exp" value="'.$resultado->type_corner.'">
                          </div>

                          <div class="col-md-6 pb-4">   
                            <label for="type_penhouse_exp"><b>Estructura - Tipo 3:</b></label>
                              <input type="text" disabled class="form-control font-weight-bold" style="Color:#1babed; id="type_penhouse_exp" name="type_penhouse_exp" value="'.$resultado->type_penhouse.'">
                          </div>

                          <div class="col-md-6 pb-4">   
                            <label for="structure_exp"><b>Estructura - Tipo 4:</b></label>
                              <input type="text" disabled class="form-control font-weight-bold" style="Color:#1babed; id="structure_exp" name="structure_exp" value="'.$resultado->structure.'">
                          </div>

                          <div class="col-md-6 pb-4">   
                            <div id="title"></div>
                            <div id="anio"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                ';
             
          	}
        }
        else 
        {
            echo '<div style="color: red;" class="text-center"><h2><b>No hay Copropietario que mostrar</b></h2></div>';
        }

	}

	public function searchMonth (Request $request) 
    {
        $id = $request->residence_coowner;
        $year = (int) $request->year;
        $respuesta = Expenditure::where('month', $id)->where('year', $year)->get();
        $month= Month::all();
        $pagos=[];
        $i=0;
        if ($respuesta != "[]") {
          foreach ($respuesta as $value) {
            $mes = explode(',', $value->month);
            foreach ($mes as $key) {
              $pagos[$i++]=$key;
            }
          }
          foreach($month as $mostrar){
            $valor=array_search($mostrar->id, $pagos);
            $valor++;
            if (!$valor) {
              echo '<option value="'.$mostrar->id.'">'.$mostrar->month.'</option>';
            } 
          }     
        }
        else{
          foreach($month as $mostrar){

            echo '<option value="'.$mostrar->id.'">'.$mostrar->month.'</option>'; 
          } 
        }               
    }

    /*public function searchYear (Request $request) 
    {
      $id = $request->residence_coowner;
      $year = $request->year;
      $respuesta = Expenditure::where('residence_coowner', $id)->where('year', $year)->get();
     
      $meses= Month::get();
      $pagos=[];
      $i=0;
      if ($respuesta != "[]") {
        foreach ($respuesta as $value) {
          $month = explode(',', $value->month);
          foreach ($month as $key) {
            $pagos[$i++]=$key;
          }
        }
        foreach($meses as $mostrar){;
          $valor=array_search($mostrar->id, $pagos);
          $valor++;
          if ($valor) {
            echo '<i class="fa fa-check" aria-hidden="true" style="color:#4ACB91"></i> '.$mostrar->month.'<br>';
          } 
        }     
      }
    }*/

    
}
