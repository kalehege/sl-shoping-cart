<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class AddToCartController extends Controller
{
    public function __invoke(Product $product, int $count)
    {
        $count === 0 ?
            Session::forget("products.{$product->id}") :
            Session::put("products.{$product->id}", $count);

        return redirect()->back();
    }
}
