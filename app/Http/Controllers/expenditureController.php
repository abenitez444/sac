<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenditure;
use App\Models\ExpensesDetail;
use App\Models\Coowner;
use App\Models\Residence;
use App\Models\Month;
use App\Models\TypeMoney;
use DB;

class expenditureController extends Controller
{
    public function index(Request $request)
    {
    	  $expenditure = Expenditure::all();
        $coowner = Coowner::all();
        $month = Month::all();
        $typeMoney = TypeMoney::all();
        $residence = Residence::all();
        $expenses = ExpensesDetail::all();
       
 
 
        return view('expenditure.index', compact('expenditure', 'coowner', 'residence', 'month', 'typeMoney','expenses'));
    }

    public function store(Request $request) 
    {     
      $id = $request->input('id');
      $expenditure = Expenditure::firstOrNew(['id' => $id]);
      $expenditure->residence_coowner = $request->residence_coowner;
      $expenditure->year = $request->year;
      $expenditure->month = $request->month;
      $expenditure->save();
      
      $expenditure_id = $expenditure->id;

      $this->expenses_detail($expenditure_id, $request);
      
      return response()->json($expenditure);
      
    }
    
    private function expenses_detail($id, $obj)
    {
      for ($i=0; $i < count($obj->description_monthly); $i++) { 
      
        $b = str_replace('.', '', $obj->amount_monthly[$i] );
        $b = str_replace(',', '.', $b );
        $b = (float)$b;

        $b = number_format($b, 2, '.', '');

        $expenditure = new ExpensesDetail;
        $expenditure->description_monthly = $obj->description_monthly[$i];
        $expenditure->type_money = $obj->type_money[$i];
        $expenditure->amount_monthly = $b;
        $expenditure->expenditure_id = $id;
       
        $expenditure->save();
      }  

      return true;
      
    }

    public function update(Request $request)
    {
 
        $id = $request->id_request;
        $expenditure = Expenditure::firstOrNew(['id' => $id]);
        $expenditure->residence_coowner = $request->residence_coowner;
        $expenditure->year = $request->year;
        $expenditure->month = $request->month;
        $expenditure->save();

      for ($i=0; $i < count((array)$request->description_monthly); $i++) { 

        $expenditure = ExpensesDetail::firstOrNew(['id' => $request->id[$i]]);
        $expenditure->description_monthly = $request->description_monthly[$i];
        $expenditure->type_money = $request->type_money[$i];
        $expenditure->amount_monthly = $request->monthly_amount[$i];

        $expenditure->save();
      }
      
      return response()->json($expenditure);
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

    public function findGeneral($id)
    {  

      $data =  Expenditure::with('Expenditures', 'nameResidence', 'typeMonth')->where('expenditure.id',  $id)->first();

       return \Response::json($data);

    }

    public function edit($id)
    {

      $data =  Expenditure::with('Expenditures',  'typeMoney', 'typeMonth')->where('expenditure.id',  $id)->first();


      return \Response::json($data);
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
                     <div class="card-header text-white default-color-dark text-center">
                        <h6>
                            <b><i class="fas fa-building fa-md font-weight-bold" title="Residencia."></i> <b>Información Residencial</b>
                        </h6>
                    </div>
                      <div class="card-body">
                        <div class="row text-center">
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="number_rif_residence" class="dark-grey-text font-weight-bold">Número (RIF)</label>
                              <br><span>'.$resultado->type_rif.'-'.$resultado->number_rif.'</span>
                          </div>
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="type_residence_coowner" class="dark-grey-text font-weight-bold">Tipo Residencia</label>
                              <br><span>'.$resultado->typeResidences->option.'</span>
                          </div>
                        </div>
                        <hr>
                        <div class="row mt-4">
                          <div class="col-sm-8 col-md-12 col-lg-12 text-center">   
                            <label for="addres_residence" class="dark-grey-text font-weight-bold">Dirección Residencia</label>
                              <br><span>'.$resultado->addres.'</span>
                          </div>
                        </div>
                        <hr>
                        <div class="row mt-2">
                          <div class="col-sm-8 col-md-12 col-lg-12">
                           <div class="table-responsive">
                            <table class="table">
                              <thead class="text-center">
                                <th><label><h6 class="dark-grey-text  font-weight-bold">Central</h6></label></th>
                                <th><label><h6 class="dark-grey-text  font-weight-bold">Esquina</h6></label></th>
                                <th><label><h6 class="dark-grey-text  font-weight-bold">Pen house</h6></label></th>
                                <th><label><h6 class="dark-grey-text  font-weight-bold">Otros</h6></label></th>
                              </thead>
                              <tbody id="reset" >
                              <tr class="text-center">
                                <td class="font-weight-bold">'.$resultado->aliquot_center.'%</td>
                                <td class="font-weight-bold">'.$resultado->aliquot_corner.'%</td>
                                <td class="font-weight-bold">'.$resultado->aliquot_penhouse.'%</td>
                                <td class="font-weight-bold"><span>'.$resultado->structure.'</span>,<span>'.$resultado->aliquot_structure.'%</span></td>
                              </tr>
                              </tbody>
                            </table>
                          </div>
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

    public function searchResidence (Request $request) 
    {
      $id = $request->name_residence_id;

      $residence = Residence::find($id);
      $resultDos = Expenditure::where('residence_coowner', $id)->get();

      $resultTres = ExpensesDetail::where('expenditure_id', $id)->get();
      $data =  Expenditure::with('Expenditures',  'typeMoney', 'typeMonth')->where('expenditure.id',  $id)->first();
    
      
      if ($resultDos->isNotEmpty()) {

              echo'

                <div class="row justify-content-center">
                 <div class="col-md-10 offset-2">
                  <div class="card shadow mt-3">
                    <div class="card-header default-color-dark">
                      <h6 class="font-weight-bold text-white"><i class="fas fa-building fa-lg font-weight-bold" title="Detalle Gásto Mensual."></i> Detalle del Gásto Mensual (Residencia : '.$residence->name_residence.')
                    </div>';
            
              echo'
                  <div class="card-body justify-content-center">
                    <div class="table-responsive">
                      <table id="tableExpenditure" align="center" border="1" class="table table-condensed table-bordered table-hover">
                        <thead>
                              <tr class="text-center">
                                <th style="white-space:nowrap; width:1%;"><b>Més</b></th>
                                <th style="white-space:nowrap; width:1%;"><b class="ml-5"> Año</b></th>
                                <th style="white-space:nowrap; width:1%;"><b class="ml-5"> Opción</b></th>
                              </tr>
                        </thead>
                        <tbody>';
                          foreach ($resultDos as $expenditure) {
                           
                              echo'
                              <tr class="text-center">
                                <td style="white-space:nowrap; width:1%;">'.$expenditure->typeMonth->month.'</td>
                                <td style="white-space:nowrap; width:1%;">'.$expenditure->year.'</td>
                                <td style="white-space:nowrap; width:1%;"><a href="detailExpenses/'.$expenditure->id.'" title="Visualizar" id="btn-expenses" data-toggle="modal" data-target="#detailExpenses" data-whatever="'.$expenditure->id.'"">
                                  <b class="fa fa-eye"></b>
                                   <a href="edit/'.$expenditure->id.'" title="Editar" data-toggle="modal" data-target="#modal-updateExpenditure" data-whatever="'.$expenditure->id.'" ><b class="fa fa-edit"> </b></h6> </a>
                                </a></td>

                              </tr>';
                          }

              echo'
                         </tbody>
                        </table>
                       </div>    
                      </div>    
                    </div>    
                  </div>';
            /*}*/
      }else{

        echo '<br><div style="border-radius:5px;" class="col-sm-8 col-md-10 col-lg-10 offset-2 text-center blue-gradient text-white font-weight-bold p-3"><h6><b><i style="color:yellow !important;" class="fa fa-exclamation-triangle fa-md font-weight-bold" title="Seleccione el tipo de residencia del copropetario."></i></b><b class=" font-weight-bold"> No existe registro de Gásto Mensual en la Residencia.</b></h6></div>';

      }

  }

  
   public function searchExpenditure (Request $request) 
    {
      $id = $request->name_residence_id;

      $residence = Residence::find($id);
      $resultDos = Expenditure::where('residence_coowner', $id)->get();

      $resultTres = ExpensesDetail::where('expenditure_id', $id)->get();
      $data = Expenditure::with('Expenditures')->where('expenditure.id',  $id)->get();
    
      
      if ($resultDos->isNotEmpty()) {

        echo'
        <div class="row justify-content-center form-group">
          <div class="col-sm-12 col-md-12 col-lg-12  text-center mt-4">
            <label><b class="font-weight-bold">Detalle General</b></label>
            <a href="detail/'.$residence->id.'" class="blue-gradient btn-round btn-lg" title="Visualizar" id="btn-detailResidence" name="resuFormatos">
              <b class="text-white fa fa-eye"></b>
            </a>
          </div>
        </div>
        ';

          echo'
              <div class="card shadow">
                <div class="card-header default-color-dark">
                  <h6 class="font-weight-bold text-white"><i class="fas fa-building fa-lg font-weight-bold" title="Detalle Gásto Mensual."></i> Detalle del Gásto Mensual (Residencia : '.$residence->name_residence.') <a href="edit/'.$residence->id.'" title="Editar" data-toggle="modal" data-target="#modal-updateExpenditure" data-whatever="'.$residence->id.'" ><b class="offset-5 text-white fa fa-edit"> Editar</b></h6> </a>
                </div>';
            
          
              echo'
                  <div class="card-body" style="margin-top:10px;">
                    <div class="table-responsive">
                      <table id="tableExpenditure" align="center" border="1" style="width:auto; height:20px;" class="table table-condensed table-bordered table-hover">
                        <thead>
                              <tr class="text-center">
                                <th style="white-space:nowrap; width:1%;"><b>Més</b></th>
                                <th style="white-space:nowrap; width:1%;"><b class="ml-5"> Año</b></th>
                                <th style="white-space:nowrap; width:1%;"><b class="ml-5"> Descripción Monto</b></th>
                                <th style="white-space:nowrap; width:1%;"><b class="ml-5">Tipo Moneda</b></th>
                                <th style="white-space:nowrap; width:1%;"><b class="ml-5">Total</b></th>
                              </tr>
                        </thead>
                        <tbody>';
                          foreach ($resultDos as $expenditure) {
                            foreach ($expenditure->Expenditures as $detail) {
                              echo'
                              <tr class="text-center">
                                <td style="white-space:nowrap; width:1%;">'.$expenditure->typeMonth->month.'</td>
                                <td style="white-space:nowrap; width:1%;">'.$expenditure->year.'</td>
                                <td style="white-space:nowrap; width:1%;">'.$detail->description_monthly.'</td>
                                <td style="white-space:nowrap; width:1%;">'.$detail->Type_money->option.'</td>
                                <td style="white-space:nowrap; width:1%;">'.$detail->amount_monthly.'</td>
                              </tr>';
                            }
                          }

              echo'
                        </tbody>
                      </table>
                    </div>    
                  </div>';
         
      }else{

        echo '<br><div style="border-radius:5px;" class="text-center blue-gradient text-white font-weight-bold p-3"><h6><b><i style="color:yellow !important;" class="fa fa-exclamation-triangle fa-md font-weight-bold" title="Seleccione el tipo de residencia del copropetario."></i></b><b class="font-weight-bold"> No existe registro de Gásto Mensual en la Residencia.</b></h6></div>';

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
