<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::whereGuardName('web')->paginate(15);

        return view('pages.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'credits' => ['required'],
            'active' => ['nullable']
        ]);

        $validated['active'] = isset($validated['active']);

        $user = User::create($validated);

        return redirect()->route('users.index')->with('success', 'User has been successfully saved');
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'credits' => ['required'],
            'active' => ['nullable']
        ]);

        $validated['active'] = isset($validated['active']);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User has been successfully saved');
    }

    public function makeAnonymous(User $user){

        $user->update([
            'name' => 'Anonymous',
            'email' => 'Anonymous',
            'active' => false
        ]);

        return redirect()->route('users.index');
    }
}
