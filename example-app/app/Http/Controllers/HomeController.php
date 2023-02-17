<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function initialize(string $name): View
    {
        return view('home', [
            'name' => strtoupper($name[0]) . substr($name, 1, strlen($name))
        ]);
    }
}