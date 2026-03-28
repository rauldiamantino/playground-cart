<?php

namespace App\Http\Controllers\Domain\Admin;

use App\Domain\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (Request $request)
    {
        $products = Product::all();

        return view('domain.admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('domain.admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        return view('domain.admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted');
    }
}
