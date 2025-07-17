<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class GroupController extends Controller
{
    public function index(): View
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function create(): View
    {
        return view('groups.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        Group::create($data);
        return redirect()->route('groups.index');
    }

    public function show(Group $group): View
    {
        return view('groups.show', compact('group'));
    }

    public function edit(Group $group): View
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $group->update($data);
        return redirect()->route('groups.index');
    }

    public function destroy(Group $group): RedirectResponse
    {
        $group->delete();
        return redirect()->route('groups.index');
    }
} 