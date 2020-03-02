<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class proyectController extends Controller
{

    public function index(ProyectDataTable $dataTables)
    {
    	/*$inventories = Inventory::all();
    	return view('inventory.list', compact('inventories'));*/
        return $dataTables->render('proyect.index');
    }
    public function show(){

    	return view('proyect.show');
    	
    }
}
