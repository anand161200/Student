<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    function employelist()
    {
        return view('pagination.employee_demo');
    }

    function employeeData(Request $request)
    {
       $start_point =$request->page_number * $request->page_select - $request->page_select + 1;
       $end_point = $request->page_number * $request->page_select;
       $result=Employee::offset($start_point)->take($request->page_select)->get();
       $all_data = Employee::all();
       $page_button = (ceil(count($all_data)/$request->page_select));

        return response()->json([
            'users' => $result,
            'page_count'=>$page_button,
            'emp_list' => $all_data,
            'start' => $start_point,
            'end' => $end_point
        ],200);    
    }

    public function addEmployee(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'emp_name' => 'required',
            'emp_designation' => 'required',
            'emp_city' => 'required',
        ]);

        $employee= new Employee();
        $employee->name=$request->emp_name;
        $employee->designation=$request->emp_designation;
        $employee->city=$request->emp_city;
        $employee->save();

        return response()->json([
            'message' => 'record added'  
        ],200);    
    }
}