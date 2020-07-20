<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residence;

class residenceController extends Controller
{
     public function index()
    {
    	$residence = Residence::all();
    	
        return view('residence.index', compact('residence'));
    }

    public function edit(Request $request)
    {   
        $residence = Residence::find($request->id);

        return response()->json($residence);
    }

    public function detail($id)
    {   
        $residence = Residence::find($id);

        return response()->json($residence);
    }

    public function store(Request $request) 
    {   
        $this->residenceValidate($request);

	 	$id = $request->input('id');
        $residence = Residence::firstOrNew(['id' => $id]);
        $residence->fill($request->all());
        $residence->save();
        
        return \Response::json(['message' => 'Conjunto residencial ya registrado'], 200);
    }

    public function destroy(Request $request)
    {   
        $residence = Residence::find($request->id);
        
        if ($residence != null) {
            $residence->delete();
            
            return response()->json(['message' => 'La residencia ha sido eliminada exitosamente.']);
        }
    }

    public function residenceValidate($request)
    {
         $request->validate (
            [
                'name_residence' =>  'required|max:60|min:2',
                'type_residence' =>  'required',
                'type_rif' =>  'nullable',
                'number_rif' =>  'nullable|digits_between:6,9',
                'addres' =>  'nullable',
                'email_residence' =>  'nullable|email',
            ], 

            [
                'name_residence.required' => 'Ingrese el nombre de la residencia.',
                'type_residence.required' => 'Seleccione el tipo de residencia.',
                'name.max' => 'El nombre de la residencia no debe ser mayor a 60 caracteres.',
                'name.min' => 'El nombre de la residencia no debe ser menor a 2 caracteres.',
                'number_rif.digits_between' => 'Introduzca el número de RIF  válido de la residencia.',
                'email' => 'Ingrese el correo válido de la residencia.',
                'addres' => 'Ingrese la dirección de la residencia.',
            ]
        );
    }
}
