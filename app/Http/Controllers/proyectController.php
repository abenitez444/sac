<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProyectDataTable;
use App\Models\Proyect;
use App\Models\TypeProyect;
use App\Models\Statu;
use App\Models\Lists;
use App\Models\Task;


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
    public function show(Proyect $proyect)
    {

    	return view('proyect.show', compact('proyect'));
    	
    }
    public function list($id)
    {
        $lists = Lists::where('proyect_id', $id)->get();
        $board_results = array();

         foreach ($lists as $lists){
                $itemArr = array();
                foreach ($lists->task as $item){
                    $itemArr[] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'date' => $item->created_at,
                    ];
                }
                $board_results[] = [
                    'id' => $lists->id,
                    'name' => $lists->name,
                    'tasks' => $itemArr
                ];
            }

        return response()->json($board_results);
        
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
