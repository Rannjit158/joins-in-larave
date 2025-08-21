<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('faculty')->get();
        return view('teacher.index', compact('teachers'));
    }
    public function create()
{
    $faculties=Faculty::all();
    return view('teacher.create',compact('faculties'));
}
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|string|max:255',
             'age'=> 'required',
            'faculty_id' => 'required|exists:faculties,id'
        ]);
        $teachers=Teacher::create(
            [
              'name' => $request->name,
               'age' => $request->age,
               'faculty_id' => $request->faculty_id,
            ]
        );
        return redirect()->route('teacher.index')->with('success', 'Teacher added successfully');
    }
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $faculties = Faculty::all();
        return view('teacher.edit', compact('teacher', 'faculties'));
    }
public function update(Request $request, $id)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'age' => 'required|integer',
           'faculty_id' => 'required|exists:faculties,id'
       ]);

       $teacher = Teacher::findOrFail($id);
       $teacher->update($request->only(['name', 'age', 'faculty_id']));

       return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully');
   }
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully');
    }


}
