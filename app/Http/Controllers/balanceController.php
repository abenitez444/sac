<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\Coowner;
use App\Models\Residence;
use App\Models\Expenditure;
use App\Models\ExpensesDetail;


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
        $result = Coowner::where('id', $id)->get();
        $resultRes = Residence::where('id', $id)->get();
        $expenses = Expenditure::where('residence_coowner', $id)->get();
        $expense = Coowner::where('name_residence_id', $id)->get();
        $amount = ExpensesDetail::where('expenditure_id', $id)->get();
       // dd($amount);
      // dd($expense[0]->type_structure_id);

       
        if (isset($result)) 
        {	

            foreach($result as $resultado) 
            {
             
            foreach($resultRes as $res) 
            {

           	
            	
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
                              <br><span><h4><i class="fas fa-user font-weight-bold"> '.$resultado->name.' </i></h4></span>
                           </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="name_residence_id" class="dark-grey-text font-weight-bold">Residencia</label>
                              <br><span>'.$resultado->nameResidence->name_residence.'</span>
                          </div>
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="type_residence_id" class="dark-grey-text font-weight-bold">Tipo</label>
                              <br><span>'.$resultado->typeResidence->option.'</span>
                          </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="number_apto" class="dark-grey-text font-weight-bold">Número/Letra</label>
                              <br><span>'.$resultado->number_letters.'</span>
                          </div>
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="type_residence_id" class="dark-grey-text font-weight-bold">Estructura</label>
                              <br><span>'.$resultado->typeStructu->option.'</span>
                          </div>
                        </div>
                        <hr>
                        <div class="row mt-4">
                          <div class="col-sm-8 col-md-12 col-lg-12 text-center">   
                            <label for="addres_residence" class="dark-grey-text font-weight-bold">Dirección</label>
                              <br><span>'.$res->addres.'</span>
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
                                <td class="font-weight-bold">'.$res->aliquot_center.'%</td>
                                <td class="font-weight-bold">'.$res->aliquot_corner.'%</td>
                                <td class="font-weight-bold">'.$res->aliquot_penhouse.'%</td>
                                <td class="font-weight-bold"><span>'.$res->structure.'</span> - <span>'.$res->aliquot_structure.'%</span></td>
                              </tr>
                              </tbody>
                            </table>
                           </div>
                          </div>
                         </div>
                         
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
                            <b><i class="fas fa-building fa-md font-weight-bold" title="Residencia."></i> <b>Mes por pagar</b>
                        </h6>
                    </div>';
                        
                foreach($expenses as $detail) 
                {
                	foreach($expense as $structure) 
                	{

                	  if ($structure->type_structure_id == 1) {
		                $structure->type_structure_id = 'Central';
		              }
		              if ($structure->type_structure_id  == 2) {
		                $structure->type_structure_id  = 'Esquina';
		              }
		              if ($structure->type_structure_id == 3) {
		                $structure->type_structure_id = 'Pen House';
		              }
                 
	               		echo'
			           		<div class="card-body ">
			                    <div class="row">
			                        <div class="col-sm-10 col-md-12 col-lg-12">  
			                          <span>Estructura: '.$structure->type_structure_id.'</span>
					               		<div class="table-responsive">
				                            <table class="table table-condensed table-bordered table-hover">
				                              <thead class="text-center">
				                              </thead>
				                              <tbody id="reset" >
				                              <tr class="text-center">
				                                <td class="font-weight-bold"><li>'.$detail->typeMonth->month.'</li></td>
				                                <td class="font-weight-bold"></td>
				                              </tr>
				                              </tbody>
				                            </table>
				                        </div>
			                        </div>
		                        </div>
		                    </div>';
	                    //VER SI PUEDO COLOCAR ESTRUCTURA FUERA DEL FOREACH
		           	  	    }
		        	  	}
		            }
		        }
        }
        else 
        {
            echo '<div style="color: red;" class="text-center"><h2><b>No hay Copropietario que mostrar</b></h2></div>';
        }

    }

}
