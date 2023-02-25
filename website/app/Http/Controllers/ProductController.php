<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('articles.index', compact('products'));
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Product::create($request->all());

        return redirect()->intended()->with('success', 'Article succesfully created');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Article succesfully deleted');
    }

    public function edit(Product $product): View
    {
        return view('articles.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Article updated successfully');
    }
}