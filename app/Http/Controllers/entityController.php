<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;
use App\Models\DocumentType;

class entityController extends Controller
{
     public function index()
    {
    	$entity = Entity::all();
    	$documentType = DocumentType::all();
    	
        return view('entity.index', compact('entity', 'documentType'));
    }

    public function edit($id)
    {
    	$entity = Entity::find($id);

    	return response()->json($entity);
    }

    public function detail($id)
    {   
        $entity = Entity::with('Type')->where('entity.id', $id)->first();

        return response()->json($entity);
    }

    public function store(Request $request) 
    {   
        
        $this->entityValidate($request);

	 	$id = $request->input('id');
        $entity = Entity::firstOrNew(['id' => $id]);
        $entity->fill($request->all());
        $entity->save();
        
        return \Response::json(['message' => 'Usuario ya registrado'], 200);
    }

    public function destroy(Request $request)
    {   
            $entity = Entity::find($request->id);
            
            if ($entity != null) {
                $entity->delete();
                
                return response()->json(['message' => 'El empleado ha sido eliminado exitosamente.']);
            }
    }

    public function entityValidate($request)
    {
         $request->validate (

            [
                'name' =>  'required|max:60|min:2',
                'identity' =>    'nullable|digits_between:6,9',
                'email' =>  'nullable|email',
            ], 

            [
                'name.required' => 'Introduzca el nombre del ente.',
                'name.max' => 'El nombre del ente no debe ser mayor a 60 caracteres.',
                'name.min' => 'El nombre del ente no debe ser menor a 2 caracteres.',
                'identity.digits_between' => 'Introduzca el número de identificación  válido del ente.',
                'email.email' => 'Introduzca el correo electrónico válido del ente.',
            ]
        );
    }
 
}
