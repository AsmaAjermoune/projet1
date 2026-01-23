<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;
// use App\Http\Requests\UpdatestudentsRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $students = students::all();
       $data = json_encode($students);
        return view('students.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'file'=>'required|image'
        ]);
        $path = $request->file("file")->store('students','public');
        students::create([
            'nom'=>$request->nom,
            'file'=>$path,
            ]);
        return redirect()->route('students.index')->with('success','Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(students $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(students $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, students $student)
    {
        $request->validate([
            'nom'=>'required',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(students $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Student deleted successfully');
    }

   
}
