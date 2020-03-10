<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class employeeController extends Controller
{
     public function index()
    {
    	$employee = Employee::all();
    	return view('employee.list', compact('employee'));
    }

 /*   public function create()
    {

    	return view('employee.store');

    }*/


   /* public function edit($id)
    {
    	$employee = Employee::find($id);

    	if(isset($employee))
    	{

    		return view('employee.store', compact('employee'));

    	}else
    	{

        	return redirect('/employee/index')->with('success');

    	}
    }*/

    public function detail($id)
    {
        $employee = Employee::find($id);
        if(isset($employee))
        {
           
            return view('employee.detail', compact('employee'));

        }else
        {

            return redirect('/employee/index')->with('success');

        }
    }



    public function save(Request $request) 
    {
	 	$id = $request->input('id');
        $employee = Employee::firstOrNew(['id' => $id]);
        $employee->fill($request->all());

        $employee->save();
        
        return redirect('/employee/index')->with('success', 'Registro exitoso');
    }
}
