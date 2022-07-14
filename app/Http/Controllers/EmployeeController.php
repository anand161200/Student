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

    function employeeData($page_size = 1,$page_number=1)
    {
       $all_data = Employee::all();
       $page_button = (ceil(count($all_data)/$page_size));

        return response()->json([
            'users' => Employee::take($page_size)->get(),
            'page_count'=>$page_button ,
            'emp_data'=> $all_data,
        ],200);
    }

    function empData(Request $request)
    {
        //dd($request->all());
        dd($request->page);
    }
}
