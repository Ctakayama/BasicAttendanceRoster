<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::orderBy('last_name', 'ASC')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_id)
    {
        $myStudent = Student::find($student_id);
        if($myStudent){
            $myStudent->is_present = $request->student['is_present'];
            $myStudent->save();
            return $myStudent;
        }
        return response()->json(['success'=>'Status change failed.']);
        
    }

}
