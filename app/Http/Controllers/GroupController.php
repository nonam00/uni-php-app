<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class GroupController extends Controller
{
    public function home(): View
    {
        $search = request()->input('search', '');
        $sortField = request()->input('sortField', 'group_title');
        $sortDirection = request()->input('sortDirection', 'asc');

        $query = \DB::table('groups')
            ->join('group_module', 'groups.id', '=', 'group_module.group_id')
            ->join('modules', 'group_module.module_id', '=', 'modules.id')
            ->join('teachers', 'modules.teacher_id', '=', 'teachers.id')
            ->select(
                'groups.title as group_title',
                'modules.title as module_title',
                'teachers.name as teacher_name'
            );

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('groups.title', 'like', "%{$search}%")
                  ->orWhere('modules.title', 'like', "%{$search}%")
                  ->orWhere('teachers.name', 'like', "%{$search}%");
            });
        }

        // Сортировка
        $allowedSortFields = ['group_title', 'module_title', 'teacher_name'];
        if (!in_array($sortField, $allowedSortFields)) {
            $sortField = 'group_title';
        }
        $sortDirection = strtolower($sortDirection) === 'desc' ? 'desc' : 'asc';
        $query->orderBy($sortField, $sortDirection);

        $groupsModules = $query->get();

        // Для фильтров
        $allGroups = \DB::table('groups')->pluck('title')->unique();
        $allModules = \DB::table('modules')->pluck('title')->unique();
        $allTeachers = \DB::table('teachers')->pluck('name')->unique();

        return view('home', [
            'search' => $search,
            'groupsModules' => $groupsModules,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection,
            'allGroups' => $allGroups,
            'allModules' => $allModules,
            'allTeachers' => $allTeachers,
        ]);
    }

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
        $group->load(['students', 'modules']);
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