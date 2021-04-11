<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Support\Facades\Session;

class ViewCartController extends Controller
{
    public function __invoke()
    {
        $cart = Cart::make(Session::get('products', []));

        return view('cart', ['cart' => $cart]);
    }
}
