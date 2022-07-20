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
       $start_point =$request->page_number * $request->page_select - $request->page_select;
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

    public function storeOrupdate(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'emp_name' => 'required|unique:employee,name,'.$request->emp_id,
            'emp_designation' => 'required',
            'emp_city' => 'required',
        ]);

        $employee = $request->emp_id !== null ? Employee::find($request->emp_id) : new Employee();
        $employee->fill([
            'name'=>$request->emp_name,
            'designation'=>$request->emp_designation,
            'city'=>$request->emp_city
        ])->save();

        // if($request->emp_id !== null)
        // {
        //     $update_data = Employee::find($request->emp_id);
        //     $update_data->name=$request->emp_name;
        //     $update_data->designation=$request->emp_designation;
        //     $update_data->city=$request->emp_city;
        //     $update_data->save();
        // }
        //  else{
        //     $employee= new Employee();
        //     $employee->name=$request->emp_name;
        //     $employee->designation=$request->emp_designation;
        //     $employee->city=$request->emp_city;
        //     $employee->save();
        // }

        return response()->json([
            'Record add and update successfully'  
        ],200);
    }

    public function employeeDetails($id)
    {
        $emp=Employee::find($id);
        
        return response()->json([
            'details'  => $emp
        ],200); 
    }
    
    public function deleteEmployee(Request $request)
    {
        $deleterecord=Employee::find($request->emp_id);
        $deleterecord->delete();
    }
}