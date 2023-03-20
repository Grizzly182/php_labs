<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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

    public function store(UserRequest $request): RedirectResponse
    {
        User::create($request->all());

        return redirect()->back()->with('success', 'User succesfully created.');
    }
}