<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProyectDataTable;
use App\Models\Proyect;
use App\Models\TypeProyect;
use App\Models\Statu;


class proyectController extends Controller
{

    public function index(ProyectDataTable $dataTables)
    {
        $status = Statu::all();
        $types = TypeProyect::all();
    	/*$inventories = Inventory::all();
    	return view('inventory.list', compact('inventories'));*/
        return $dataTables->render('proyect.index', compact('status', 'types'));
    }
    public function show(Proyect $proyect){

    	return view('proyect.show', compact('proyect'));
    	
    }

    public function store(Request $request) 
    {
        $id = $request->input('id');
        $proyect = Proyect::firstOrNew(['id' => $id]);
        $proyect->fill($request->all());
        $proyect->save();
        
        return $proyect;
    }

    public function edit(Proyect $proyect)
    {
        return $proyect;
    }
}
