<?php

namespace App\Http\Controllers;
use App\Models\Faculty;
use App\Models\Teacher;
use App\Models\FacultyTeacher;

use Illuminate\Http\Request;

class FacultyTeacherController extends Controller
{
    public function index()
    {
        $facultiesteachers=FacultyTeacher::with('faculty','teacher')->get();
        return view('faculty_teacher.index', compact('facultiesteachers'));

    }
    public function create()
    {
        $faculties=Faculty::all();
        $teachers=Teacher::all();
       return view('faculty_teacher.create', compact('faculties','teachers'));

    }
    public function store(Request $request)
    {
        $request->validate([
            'faculty_id' => 'required|exists:faculties,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $facultiesteacher=FacultyTeacher::create($request->all());

        return redirect()->route('faculty_teacher.index',compact('facultiesteacher'))->with('success', 'Faculty-Teacher relationship created successfully.');
    }
    public function edit($id)
    {
        $faculties = Faculty::all();
        $teachers = Teacher::all();
        $facultiesteacher = FacultyTeacher::findOrFail($id);
        return view('faculty_teacher.edit', compact('faculties', 'teachers', 'facultiesteacher'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'faculty_id'=>'required|exists:faculties,id',
            'teacher_id'=>'required|exists:teachers,id',
        ]);
         $facultiesteacher=FacultyTeacher::findOrFail($id);
         $facultiesteacher->update($request->all());
         return redirect()->route('faculty_teacher.index')->with('success','Faculty-Teacher update successfull');

    }
    public function destroy($id)
    {
        $facultiesteacher = FacultyTeacher::findOrFail($id);
        $facultiesteacher->delete();
        return redirect()->route('faculty_teacher.index')->with('success','Delete successful');
    }
}
