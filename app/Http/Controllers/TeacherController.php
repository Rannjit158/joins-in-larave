<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', compact('teachers'));
    }
    public function create()
{

    return view('teacher.create');
}
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|string|max:255',
             'age'=> 'required',

        ]);
        $teachers=Teacher::create(
            [
              'name' => $request->name,
               'age' => $request->age,

            ]
        );
        return redirect()->route('teacher.index')->with('success', 'Teacher added successfully');
    }
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('teacher.edit', compact('teacher'));
    }
public function update(Request $request, $id)
   {
       $request->validate([
           'name' => 'required|string|max:255',
           'age' => 'required|integer',

       ]);

       $teacher = Teacher::findOrFail($id);
       $teacher->update([
           'name' => $request->name,
           'age' => $request->age
       ]);

       return redirect()->route('teacher.index')->with('success', 'Teacher updated successfully');
   }
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Teacher deleted successfully');
    }


}
