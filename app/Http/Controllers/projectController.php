<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProjectDataTable;
use App\Models\Project;
use App\Models\TypeProject;
use App\Models\Statu;
use App\Models\Lists;
use App\Models\Task;


class projectController extends Controller
{

    public function index(ProjectDataTable $dataTables)
    {
        $status = Statu::all();
        $types = TypeProject::all();
    	/*$inventories = Inventory::all();
    	return view('inventory.list', compact('inventories'));*/
        return $dataTables->render('project.index', compact('status', 'types'));
    }
    public function show(Project $project)
    {

    	return view('project.show', compact('project'));
    	
    }
    public function list($id)
    {
        $lists = Lists::where('project_id', $id)->get();
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
        $project = Project::firstOrNew(['id' => $id]);
        $project->fill($request->all());
        $project->save();
        
        return $project;
    }

    public function edit(Project $project)
    {
        return $project;
    }
}
