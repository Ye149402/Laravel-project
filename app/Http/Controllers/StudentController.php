<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->get();
        return view('backend.student.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump($request->all());
        // die();
        $request->validate([
            'studentName' => 'required|min:3',
            'studentAge' => 'required|numeric',
            'studentGender' => 'required',
            'studentAddress' => 'required',
        ]);

        $student = new Student();
        $student->name = $request->studentName;
        $student->age = $request->studentAge;
        $student->gender = $request->studentGender;
        $student->address = $request->studentAddress;
        $student->save();

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $student = Student::find($id);
       return view('backend.student.edit',compact('student'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // var_dump($request->all());
        // die();
       // $request->validate([
            //'studentName' => 'required|min:3',
       // ]);

        $studentName = $request->studentName;
        $studentAge = $request->studentAge;
        $studentGender = $request->studentGender;
        $studentAddress = $request->studentAddress;


        // update into database table
        $student = Student::find($id);
        $student->name = $studentName;
        $student->age = $studentAge;
        $student->gender = $studentGender;
        $student->address = $studentAddress;
        $student->save();

        // redirect to list page
        return redirect()->route('students.index');
    }


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}