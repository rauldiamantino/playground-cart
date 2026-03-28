<?php

namespace App\Http\Controllers\Domain\Shop;

use App\Domain\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (Request $request)
    {
        $products = Product::all();

        return view('domain.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('domain.products.show', compact('product'));
    }
}
