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
        $nationality = DocumentType::all();
    	return view('employee.list', compact('employee', 'nationality'));
     }

 /*   public function create()
    {

    	return view('employee.store');

    }*/


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

         $request->validate (

            [
                'name' =>  'required|max:60|min:3',
                'ci' =>    'nullable|digits_between:6,8',
                'email' =>  'nullable|email',
            ], 

            [
                'name.required' => 'Introduzca nombre y apellido del empleado.',
                'ci.digits_between' => 'Introduzca la cédula de identidad del empleado.',
                'email.email' => 'Introduzca el corre electrónico del empleado.',
            ]
        );

        
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
                $delete = $employee->delete();
                return response()->json(['message' => 'El empleado ha sido eliminado exitosamente.']);
            }

                
    }
 
}
