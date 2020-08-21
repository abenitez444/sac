<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coowner;
use App\Models\Residence;
use App\Models\CodePhone;
use Illuminate\Support\Facades\Validator;

class coownerController extends Controller
{
    public function index()
    {
    	$coowner = Coowner::all();
        $residence = Residence::all();
        $codePhone = CodePhone::all();

        return view('coowner.index', compact('coowner', 'residence', 'codePhone'));
    }

   
    public function nameResidence (Request $request, $id) 
    {   
        $data = Residence::where('id', $id)->get();
       
        return response()->json($data);
    }

    public function typeStructure (Request $request, $id) 
    {   
        
        $query = Residence::where('id', $id)->get();
        
        $data = array($query);

        echo json_encode($data);
       
    }

    public function edit($id)
    {
    	$data = Coowner::find($id);

        return response()->json($data);
    }

    public function detail($id)
    {   
        $data = Coowner::with('codePhone', 'nameResidence')->where('coowner.id', $id)->first();

        return response()->json($data);
    }

    public function store(Request $request) 
    {   
        $this->coownerValidate($request);
        
	 	$id = $request->input('id');
        $coowner = Coowner::firstOrNew(['id' => $id]);
        $coowner->fill($request->all());
        $coowner->save();
        
        return \Response::json($coowner);
    }

    public function destroy(Request $request)
    {   
        $coowner = Coowner::find($request->id);
        
        if ($coowner != null) {
            $coowner->delete();
            
            return response()->json(['message' => 'El copropietario ha sido eliminado exitosamente.']);
        }
    }

    public function coownerValidate($request)
    {
        $request->validate (

            [
                'name' =>  'required|max:60|min:3',
                'name_residence_id' => 'required',
                'type_residence_id' => 'required',
                'number_letters' => 'required|max:20|min:1',
                'type_structure_id' => 'required',
                'phone' =>  'nullable|digits_between:7,7',
                'email' =>  'nullable|email',
            ], 

            [
                'name.required' => 'Introduzca nombre y apellido del copropietario.',
                'name.max' => 'El nombre y el apellido del empleado, no debe ser mayor a 60 caracteres.',
                'name.min' => 'El nombre y el apellido del empleado, debe ser mayor a 3 caracteres.',
                'name_residence_id.required' => 'Seleccione el nombre de la residencia.',
                'type_residence_id.required' => 'Seleccione el tipo de residencia.',
                'number_letters.required' => 'Ingrese el número o letra del hogar.',
                'type_structure_id.required' => 'Seleccione el tipo de estructura.',
                'phone.digits_between' => 'Ingrese el número de teléfono válido del copropietario.',
                'email.email' => 'Introduzca el correo electrónico válido del copropietario.',
            ]
        );
    }
}
