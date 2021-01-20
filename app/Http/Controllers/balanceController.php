<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\Coowner;
use App\Models\Residence;
use App\Models\Expenditure;
use App\Models\ExpensesDetail;
use DB;


class balanceController extends Controller
{
    public function index()
    {
    	//
    }

    public function create()
    {
    	$balance = Balance::all();
    	$coowner = Coowner::all();
        $residence = Residence::all();

        return view('balance.store', compact('balance', 'coowner', 'residence'));
    }

    public function searchCoowner (Request $request) 
    {
        $id = $request->name_coowner;
        $result =  Coowner::with('CodePhone', 'nameResidence', 'typeStructu', 'typeResidence')->where('coowner.id',  $id)->first();

        $month =  Expenditure::with('typeMonth', 'descriptionMonth')->where('expenditure.id',  $id)->first();
       //dd($month);
       
        if (isset($result))  
        {	

              if ($result->type_structure_id == 1) {
                $result->type_structure_id = 'Central';
              }
              if ($result->type_structure_id == 2) {
                $result->type_structure_id = 'Esquina';
              }
              if ($result->type_structure_id == 3) {
                $result->type_structure_id = 'Pen House';
              }
          
                echo '
                    <div class="card">
                     <div class="card-header text-white info-color-dark text-center">
                        <h6>
                            <b><i class="fas fa-building fa-md font-weight-bold" title="Residencia."></i> <b>Información Copropietario.</b>
                        </h6>
                    </div>
                      <div class="card-body">
                        <div class="row text-center">
                          <div class="col-sm-8 col-md-12 col-lg-12">   
                              <br><span><h4><i class="fas fa-user font-weight-bold"> '.$result->name.' </i></h4></span>
                           </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="name_residence_id" class="dark-grey-text font-weight-bold">Residencia</label>
                              <br><span>'.$result->nameResidence->name_residence.'</span>
                          </div>
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="type_residence_id" class="dark-grey-text font-weight-bold">Tipo</label>
                              <br><span>'.$result->typeResidence->option.'</span>
                          </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="number_apto" class="dark-grey-text font-weight-bold">Número/Letra</label>
                              <br><span>'.$result->number_letters.'</span>
                          </div>
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="type_residence_id" class="dark-grey-text font-weight-bold">Estructura</label>
                              <br><span>'.$result->type_structure_id.'</span>
      
                          </div>
                        </div>
                        <hr>
                       
                        <hr>
                        
                          <div class="col-md-6 pb-4">   
                            <div id="title"></div>
                            <div id="anio"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    <div class="card">
                     <div class="card-header text-white info-color-dark text-center">
                        <h6>
                            <b><i class="fas fa-building fa-md font-weight-bold" title="Residencia."></i> <b>Meses</b>
                        </h6>
                     </div>
                    
                     <div class="col-sm-8 col-md-12 col-lg-12 text-center">   
                        <label for="type_residence_id" class="dark-grey-text font-weight-bold">Por pagar</label>
                          <br><span>'.$month->typeMonth->month.'</span>
                     </div>
                    ';
              
        }else{
        
            echo '<div style="color: red;" class="text-center"><h2><b>No hay Copropietario que mostrar</b></h2></div>';
        }

    }

}
