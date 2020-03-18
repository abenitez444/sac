<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\InventoryDataTable;
use App\Models\Inventory;
use App\Imports\InventoryImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Entity;
use Illuminate\Support\Facades\Validator;

class inventoryController extends Controller
{
    
    public function index(InventoryDataTable $dataTables)
    {
    	$inventory = Inventory::all();
    	
        return $dataTables->render('inventory.index', compact('inventory'));
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
        $inventory = Inventory::with('Entity')->where('inventory.id', $id)->first();

        return response()->json($inventory);
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

    public function destroy(Request $request)
    {
        $inventory = Inventory::find($request->id);
            
            if ($inventory != null) {
                $delete = $inventory->delete();
                return response()->json(['message' => 'El empleado ha sido eliminado exitosamente.']);
            }
    }

}
