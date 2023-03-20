<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::query()->orderBy('created_at', 'desc')->limit(9)->get();
        return view('home.index', compact('products'));
    }

}