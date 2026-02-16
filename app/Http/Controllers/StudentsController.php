<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\gestionStagiaire;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Http\Requests\UpdatestudentsRequest;

class StudentsController extends Controller
{
   
    public function index()
    {
    //    $students = students::all();
       $students = DB::table('students')->get();
       $data = json_encode($students);
       return view('students.index', compact('data'));
    }

    
    public function create()
    {
        $gestionnaires = gestionStagiaire::all();
        $modules = Module::all();

        return view('students.create', compact('gestionnaires', 'modules'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'file'=>'required|image'
        ]);
        $path = $request->file("file")->store('students','public');
        // students::create([
        //     'nom'=>$request->nom,
        //     'file'=>$path,
        //     ]);
        DB::table('students')->insert([
              'nom'=>$request->nom,
              'file'=>$path,
        ]);
        return redirect()->route('students.index')->with('success','Student added successfully');
    }

    
    public function show(students $student)
    {
        //
    }

    public function edit(students $student)
    {
        return view('students.edit', compact('student'));
    }

   
    public function update(Request $request, students $student)
    {
        $request->validate([
            'nom'=>'required',
        ]);

        // $student->update($request->all());

        DB::table('students')->where('id',$student->id)->update(['nom'=>$request->nom]);
        return redirect()->route('students.index')->with('success','Student updated successfully');
    }

  
    public function destroy(students $student)
    {
        // $student->delete();
        DB::table('students')->where('id',$student->id)->delete();
        return redirect()->route('students.index')->with('success','Student deleted successfully');
    }

   
}
