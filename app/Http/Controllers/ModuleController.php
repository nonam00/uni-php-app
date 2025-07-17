<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Teacher;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class ModuleController extends Controller
{
    public function index(): View
    {
        $modules = Module::with('teacher', 'groups')->get();
        return view('modules.index', compact('modules'));
    }

    public function create(): View
    {
        $teachers = Teacher::all();
        $groups = Group::all();
        return view('modules.create', compact('teachers', 'groups'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'required|exists:teachers,id',
            'groups' => 'nullable|array',
            'groups.*' => 'exists:groups,id',
        ]);
        $module = Module::create($data);
        if (!empty($data['groups'])) {
            $module->groups()->sync($data['groups']);
        }
        return redirect()->route('modules.index');
    }

    public function show(Module $module): View
    {
        $module->load('teacher', 'groups');
        return view('modules.show', compact('module'));
    }

    public function edit(Module $module): View
    {
        $teachers = Teacher::all();
        $groups = Group::all();
        $module->load('groups');
        return view('modules.edit', compact('module', 'teachers', 'groups'));
    }

    public function update(Request $request, Module $module): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'required|exists:teachers,id',
            'groups' => 'nullable|array',
            'groups.*' => 'exists:groups,id',
        ]);
        $module->update($data);
        $module->groups()->sync($data['groups'] ?? []);
        return redirect()->route('modules.index');
    }

    public function destroy(Module $module): RedirectResponse
    {
        $module->delete();
        return redirect()->route('modules.index');
    }
} 