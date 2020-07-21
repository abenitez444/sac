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
        $this->employeeValidate($request);
        
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
