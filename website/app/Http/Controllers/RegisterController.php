<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $path = $request->file('avatar')->store('avatars');
        //$user = User::create($request->input('email'), $request->input('name'), $request->input('password'), $path);
        $user = new User();
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->avatar = $path;
        $user->assignRole('User');
        $user->save();
        auth()->login($user);

        return redirect()->intended()->with('success', 'Account succesfully registered');
    }
}