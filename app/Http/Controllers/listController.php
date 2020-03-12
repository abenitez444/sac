<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;

class listController extends Controller
{
    public function index($id)
    {
        $lists = Lists::where('project_id', $id)->orderBy('order', 'asc')->get();
        $board_results = array();

         foreach ($lists as $list){
                $itemArr = array();
                foreach ($list->task->sortBy('order') as $item){
                    $itemArr[] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'date' => $item->created_at->format('d-m-Y'),
                        'description' => $item->description,
                        'order' => $item->order,

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

    public function create(Request $request) 
    {
        $list = Lists::create(request()->all());
        $board_results = array();
        $itemArr = array();
        $board_results = [
            'id' => $list->id,
            'name' => $list->name,
            'order' => $list->order,
            'tasks' => $itemArr
        ];
        return response()->json($board_results);
    }

    public function move(Request $request) 
    {

        foreach ($request->lists as $key => $list) {

            $data = Lists::find($list['id']);
            $data->order = $key;
            $data->save();
        }

        return response()->json($data);
    }

    public function edit(Request $request)
    {

        $list = Lists::find($request->id);
        $list->name = $request->name;
        $list->save();

        return response()->json($list);
    }
    public function show(Request $request)
    {
        $list = Lists::find($request->id);

        return response()->json($list);
    }

    public function deleted(Request $request)
    {
    	
        $list = Lists::destroy($request->id);

        return response()->json($list);
    }
}
