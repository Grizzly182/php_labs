<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function showEditing(): View
    {
        $products = Product::all();

        return view('articles.index', compact('products'));
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        Product::create($request->all());

        return redirect()->back()->with('success', 'Product succesfully created');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->authorize('delete', $product);
        $product->delete();

        return redirect()->back()->with('success', 'Product succesfully deleted');
    }

    public function edit(Product $product): View
    {
        $this->authorize('update', $product);
        return view('articles.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->all());

        return redirect()->intended()->with('success', 'Article updated successfully');
    }
}