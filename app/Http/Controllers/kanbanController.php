<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProyectDataTable;
use App\Models\Proyect;
use App\Models\TypeProyect;
use App\Models\Statu;
use App\Models\Lists;
use App\Models\Task;


class kanbanController extends Controller
{

    public function list($id)
    {
        $lists = Lists::where('proyect_id', $id)->get();
        $board_results = array();

         foreach ($lists as $list){
                $itemArr = array();
                foreach ($list->task as $item){
                    $itemArr[] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'date' => $item->created_at,
                    ];
                }
                $board_results[] = [
                    'id' => $list->id,
                    'name' => $list->name,
                    'tasks' => $itemArr
                ];
            }

        return response()->json($board_results);
        
    }

    public function createList(Request $request) 
    {
        $list = Lists::create(request()->all());
        $board_results = array();
        $itemArr = array();
        $board_results = [
            'id' => $list->id,
            'name' => $list->name,
            'tasks' => $itemArr
        ];
        return response()->json($board_results);
    }

    public function edit(Proyect $proyect)
    {
        return $proyect;
    }
}
