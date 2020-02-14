<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InventoryImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Entity;
use App\Models\Inventory;

class inventoryController extends Controller
{
    public function create()
    {
    	$entities = Entity::all();
    	return view('inventory.create', compact('entities'));

    }

    public function list()
    {
    	$inventories = Inventory::all();
    	return view('inventory.list', compact('inventories'));
    }

    public function detail($id)
    {
    	$inventory = Inventory::find($id);
    	if(isset($inventory))
    	{
    		return view('inventory.detail', compact('inventory'));
    	}else
    	{
        	return redirect('/inventory/list')->with('success');
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

        Excel::import(new InventoryImport, request()->file('file'), 1);
        return redirect('/inventory/list')->with('success', 'Registro exitoso!');
    }


    public function save(Request $request) 
    {
	 	$id = $request->input('id');
        $inventory = Inventory::firstOrNew(['id' => $id]);
        $inventory->fill($request->all());

        $inventory->save();
        
        return redirect('/inventory/list')->with('success', 'Registro exitoso');
    }
}
