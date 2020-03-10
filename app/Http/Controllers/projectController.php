<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProjectDataTable;
use App\Models\Project;
use App\Models\TypeProject;
use App\Models\StatusProject;
use App\Models\Lists;
use App\Models\Task;


class projectController extends Controller
{

    public function index(ProjectDataTable $dataTables)
    {
        $status = StatusProject::all();
        $types = TypeProject::all();
    	/*$inventories = Inventory::all();
    	return view('inventory.list', compact('inventories'));*/
        return $dataTables->render('project.index', compact('status', 'types'));
    }
    public function show(Project $project)
    {

    	return view('project.show', compact('project'));
    	
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
