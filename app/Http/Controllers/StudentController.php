<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::with('group')->get();
        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        $groups = Group::all();
        return view('students.create', compact('groups'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'group_id' => 'required|exists:groups,id',
        ]);
        Student::create($data);
        return redirect()->route('students.index');
    }

    public function show(Student $student): View
    {
        $student->load('group');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        $groups = Group::all();
        return view('students.edit', compact('student', 'groups'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'group_id' => 'required|exists:groups,id',
        ]);
        $student->update($data);
        return redirect()->route('students.index');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();
        return redirect()->route('students.index');
    }
} 