<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsListController extends Controller
{
    public function __invoke()
    {
        return view('products', ['products' => Product::all()]);
    }
}
