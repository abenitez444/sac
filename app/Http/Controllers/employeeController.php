<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\DocumentType;
use Illuminate\Support\Facades\Validator;

class employeeController extends Controller
{
    public function index()
    {
    	$employee = Employee::all();
        $typeDocument = DocumentType::all();
    	
        return view('employee.index', compact('employee', 'typeDocument'));
    }

    public function edit($id)
    {
    	$employee = Employee::find($id);

    	return response()->json($employee);
    }

    public function detail($id)
    {   
        $employee = Employee::with('DocumentType')->where('employee.id', $id)->first();

        return response()->json($employee);
    }

    public function save(Request $request) 
    {   
        $this->employeeValidate($request);
        
	 	$id = $request->input('id');
        $employee = Employee::firstOrNew(['id' => $id]);
        $employee->fill($request->all());
        $employee->save();
        
        return \Response::json(['message' => 'Usuario ya registrado'], 200);
    }

    public function destroy(Request $request)
    {   
            $employee = Employee::find($request->id);
            
            if ($employee != null) {
                $employee->delete();
                
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
            ], 

            [
                'name.required' => 'Introduzca nombre y apellido del empleado.',
                'ci.digits_between' => 'Introduzca la cédula de identidad del empleado.',
                'email.email' => 'Introduzca el corre electrónico del empleado.',
            ]
        );
    }
 
}
