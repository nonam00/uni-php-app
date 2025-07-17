<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'role:admin']);
    }

    public function index(): View
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user): View
    {
        $roles = ['student', 'teacher', 'admin'];
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'role' => ['required', 'in:student,teacher,admin'],
        ]);

        $user->update($data);

        return redirect()->route('users.index')->with('status', 'role-updated');
    }
} 