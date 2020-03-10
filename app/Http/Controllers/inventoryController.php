<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InventoryImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Entity;
use App\Models\Inventory;
use App\DataTables\InventoryDataTable;
use Illuminate\Support\Facades\Validator;

class inventoryController extends Controller
{
    
    public function index(InventoryDataTable $dataTables)
    {
    	/*$inventories = Inventory::all();
    	return view('inventory.list', compact('inventories'));*/
        return $dataTables->render('inventory.list');
    }

    public function create()
    {
    	$entities = Entity::all();
    	return view('inventory.store', compact('entities'));

    }


    public function edit($id)
    {
    	$inventory = Inventory::find($id);
        $entities = Entity::all();


    	if(isset($inventory))
    	{
    		return view('inventory.store', compact('inventory', 'entities'));
    	}else
    	{
        	return redirect('/inventory/index')->with('success');
    	}
    }

    public function detail($id)
    {
        $inventory = Inventory::find($id);
        if(isset($inventory))
        {
            return view('inventory.detail', compact('inventory'));
        }else
        {
            return redirect('/inventory/index')->with('success');
        }
    }

    public function show()
    {
    	$entities = Entity::all();
    	return view('inventory.upload', compact('entities'));
    }

 	public function uploadFile(Request $request) 
    {
    	$entity = $request->entity;

        \Cache::put('id',$entity, 1); //*nombre, parámetro, tiempo en minuos

        Excel::import(new InventoryImport, request()->file('file'));
        
        return redirect('/inventory/index')->with('success', 'Registro exitoso!');
    }

    public function save(Request $request) 
    {

        $request->validate(
            [
                'entity_id' =>  ['required'],
                'dependencia' =>  ['required'],
                'ubicacion' =>  ['required'],
                'responsable' =>  ['required'],
                'codigo_interno' =>  ['required'],
                'descripcion' =>  ['required'],
                'serial' =>  ['required'],
                'marca' =>  ['required'],
                'modelo' =>  ['required'],
                'cantidad' =>  ['required'],
                'especificacion' =>  ['required'],
                'detalle' =>  ['required'],
            ],

            [ 
                'entity_id.required' => 'Debe seleccionar un ente.',
                'dependencia.required' => 'Introduzca la dependencia administrativa.',
                'ubicacion.required' => 'Introduzca la ubicación física del bien.',
                'responsable.required' => 'Introduzca el responsable del bien.',
                'codigo_interno.required' => 'Introduzca el código interno del bien.',
                'descripcion.required' => 'Introduzca una breve descripción del bien.',
                'serial.required' => 'Introduzca el serial del bien.',
                'marca.required' => 'Introduzca la marca del bien.',
                'modelo.required' => 'Introduzca el modelo del bien.',
                'cantidad.required' => 'Introduzca la cantidad del bien.',
                'especificacion.required' => 'Introduzca la especificación del bien.',
                'detalle.required' => 'Introduzca detalles del bien.',
            ]
        );

	 	$id = $request->input('id');
        $inventory = Inventory::firstOrNew(['id' => $id]);
        $inventory->fill($request->all());
        $inventory->save();
 
      return \Response::json(['message' => 'Usuario ya registrado'], 200);
        
    }

}
