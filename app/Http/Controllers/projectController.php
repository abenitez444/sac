<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProjectDataTable;
use App\Models\Project;
use App\Models\StatusProject;
use App\Models\Lists;
use App\Models\Entity;
use App\Models\Activity;


class projectController extends Controller
{

    public function index(ProjectDataTable $dataTables)
    {
        $status = StatusProject::all();
        $entities = Entity::all();
        return $dataTables->render('project.index', compact('status', 'entities'));
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


        for ($i=1; $i <= 3; $i++) {

            $list = New Lists;
            $list->project_id = $project->id;
            switch ($i) {
                case 1:
                    $list->name = "Por hacer";
                    break;
                case 2:
                    $list->name = "En desarrollo";
                    break;
                case 3:
                    $list->name = "Terminado";
                    break;
            }
            $list->order = $i;
            $list->save();
           
        }
        
        return $project;
    }

    public function edit(Project $project)
    {
        return $project;
    }

    public function kanban(Project $project)
    {

        return view('project.kanban', compact('project'));
        
    }
}
