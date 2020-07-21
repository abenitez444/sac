<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class activityController extends Controller
{
    public function create(Request $request) 
    {
        $task = Activity::create(request()->all());
        $board_results = array();
        $board_results = [
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'date' => $task->created_at->format('d-m-Y'),
            'order' => $task->order,
        ];
        return response()->json($board_results);
    }

    public function move(Request $request) 
    {
        $task = Activity::find($request->id);
        $task->list_id = $request->list_id;
        $task->save();

        foreach ($request->tasks as $key => $list) {

            $data = Activity::find($list['id']);
            $data->order = $key;
            $data->save();
        }

        return response()->json($task);
    }
    public function edit(Request $request)
    {

        $task = Activity::find($request->id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        return response()->json($task);
    }

    public function show(Request $request)
    {
        $task = Activity::find($request->id);

        return response()->json($task);
    }

    public function deleted(Request $request)
    {
        
        $task = Activity::destroy($request->id);

        return response()->json($task);
    }
}
