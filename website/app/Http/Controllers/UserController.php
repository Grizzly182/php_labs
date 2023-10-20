<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Commands\Show;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user): View
    {
        $products = $user->accounts;
        return view('users.profile', compact('products'))->with(compact('user'));
    }

    public function showEditing(): View
    {
        $users = User::all();
        return view('users.editor', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function downloadAvatar(string $path)
    {
        return \Illuminate\Support\Facades\Storage::download($path);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $user->update($request->all());
        if ($request->file('avatar') != null) {
            $user->avatar = $request->file('avatar')->store('avatars');
            $user->save();
        }
        $user->syncRoles([]);
        $user->assignRole($request->input('role'));
        $users = User::all();
        return view('users.editor', compact('users'));
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        User::create($request->all());

        return redirect()->back()->with('success', 'User succesfully created.');
    }

    public function searchUser(): View
    {
        if (request('user_search')) {
            $users = User::where("name", 'like', "%" . request('user_search') . "%")->get();
        } else {
            $users = User::all();
        }

        return view('users.editor')->with('users', $users);
    }
}