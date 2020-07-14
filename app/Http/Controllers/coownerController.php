<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coowner;
use App\Models\CodePhone;
use Illuminate\Support\Facades\Validator;

class coownerController extends Controller
{
    public function index()
    {
    	$coowner = Coowner::all();
        $codePhone = CodePhone::all();
    	
        return view('coowner.index', compact('coowner', 'codePhone'));
    }

    public function edit($id)
    {
    	$coowner = Coowner::find($id);

    	return response()->json($coowner);
    }

    public function detail($id)
    {   
        $coowner = Coowner::with('CodePhone')->where('coowner.id', $id)->first();

        return response()->json($coowner);
    }

    public function store(Request $request) 
    {   
        $this->employeeValidate($request);
        
	 	$id = $request->input('id');
        $coowner = Coowner::firstOrNew(['id' => $id]);
        $coowner->fill($request->all());
        $coowner->save();
        
        return \Response::json(['message' => 'Usuario ya registrado'], 200);
    }

    public function destroy(Request $request)
    {   
        $coowner = Coowner::find($request->id);
        
        if ($coowner != null) {
            $coowner->delete();
            
            return response()->json(['message' => 'El empleado ha sido eliminado exitosamente.']);
        }
    }

    public function employeeValidate($request)
    {
        $request->validate (

            [
                'name' =>  'required|max:60|min:3',
                'ci' =>    'nullable|digits_between:6,9',
                'email' =>  'nullable|email',
                'phone' =>  'nullable|digits_between:7,7',
            ], 

            [
                'name.required' => 'Introduzca nombre y apellido del empleado.',
                'name.max' => 'El nombre y el apellido del empleado, no debe ser mayor a 60 caracteres.',
                'name.min' => 'El nombre y el apellido del empleado, debe ser mayor a 3 caracteres.',
                'ci.digits_between' => 'Introduzca el número de identificación  válido del empleado.',
                'email.email' => 'Introduzca el correo electrónico válido del empleado.',
                'phone.digits_between' => 'Introduzca el número de teléfono válido del empleado.',
            ]
        );
    }
}
