<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        return view("faculties.index", compact('faculties'));
    }

public function create()
{
    return view('faculties.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

       $faculties=Faculty::create([
            'name' => $request->name,
       ]);

        return redirect()->route('faculties.index', compact('faculties'))->with('success', 'Faculty added successfully');
    }

    public function edit($id)
    {
        $faculties = Faculty::findOrFail($id);
        return view('faculties.edit', compact('faculties'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
       $faculties=Faculty::findOrFail($id);
       $faculties->update([
        'name'=>$request->name,
       ]);

        return redirect()->route('faculties.index')->with('success', 'Faculty updated successfully');
    }

    public function destroy($id)
    {
        $faculties=Faculty::findOrFail($id);
        $faculties->delete();
        return redirect()->route('faculties.index')->with('success', 'Faculty deleted successfully');
    }
}
