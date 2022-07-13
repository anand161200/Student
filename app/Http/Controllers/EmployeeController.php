<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function employelist()
    {
        return view('pagination.employee_demo');
    }

    function employeeData()
    {
        return response()->json([
            'users' => Employee::take(10)->get()
        ],200);
    }
}
