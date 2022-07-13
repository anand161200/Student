<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {

        return view('student_demo');
    }

    public function studentData() 
    {
        return response()->json([
            'users' => Student::all()
        ],200);
    }

    public function updateStatus($id , $check)
    {
        $check_data = Student::find($id);
        
        if($check == true)
        {
           $check_data->is_complate=true;
        }
        else{
            $check_data->is_complate=false; 
        }
        $check_data->save();

        return response()->json([
            'users' => Student::all()
        ],200);
    }

    public function deleteStatus($id)
    {
        $deleterecord=Student::find($id);
        $deleterecord->delete();

        return response()->json([
            'users' => Student::all()
        ],200);
    }
}