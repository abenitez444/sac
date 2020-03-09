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
        $lists = Lists::where('proyect_id', $id)->orderBy('orden', 'asc')->get();
        $board_results = array();

         foreach ($lists as $list){
                $itemArr = array();
                foreach ($list->task as $item){
                    $itemArr[] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'date' => $item->created_at,
                        'description' => $item->description,

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
    public function createTask(Request $request) 
    {
        $task = Task::create(request()->all());
        $board_results = array();
        $board_results = [
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'date' => $task->created_at,
        ];
        return response()->json($board_results);
    }

    public function moveTask(Request $request) 
    {
        $task = Task::find($request->id);
        $task->list_id = $request->list_id;
        $task->save();

        return response()->json($task);
    }

    public function moveList(Request $request) 
    {

        foreach ($request->lists as $key => $list) {

            $data = Lists::find($list['id']);
            $data->orden = $key;
            $data->save();
        }

        return response()->json($data);
    }

    public function edit(Proyect $proyect)
    {
        return $proyect;
    }
}
