<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\Coowner;
use App\Models\Residence;


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
                     <div class="card-header text-white info-color-dark text-center">
                        <h6>
                            <b><i class="fas fa-building fa-md font-weight-bold" title="Residencia."></i> <b>Información Copropietario</b>
                        </h6>
                    </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="name_residence_id" class="dark-grey-text font-weight-bold">Nombre Residencia</label>
                              <br><input type="text" class="form-control"  id="name_residence_id" name="name_residence_id" maxlength="60" value="'.$resultado->nameResidence->name_residence.'">
                          </div>
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="type_residence_id" class="dark-grey-text font-weight-bold">Tipo Residencia</label>
                              <br><input type="text" class="form-control"  id="type_residence_id" name="type_residence_id" maxlength="60" value="'.$resultado->typeResidence->option.'">
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="number_apto" class="dark-grey-text font-weight-bold">Número/Letra</label>
                              <br><input type="text" class="form-control"  id="number_apto" name="number_apto" maxlength="60" value="'.$resultado->number_letters.'">
                          </div>
                          <div class="col-sm-8 col-md-6 col-lg-6">   
                            <label for="type_residence_id" class="dark-grey-text font-weight-bold">Tipo Residencia</label>
                              <br><input type="text" class="form-control"  id="type_residence_id" name="type_residence_id" maxlength="60" value="'.$resultado->typeResidence->option.'">
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
                            <table class="table" id="tablePayment>
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
                                <td class="font-weight-bold"><span>'.$resultado->structure.'</span> - <span>'.$resultado->aliquot_structure.'%</span></td>
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

}
