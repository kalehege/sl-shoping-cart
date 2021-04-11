<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class ProductRow extends Component
{
    public Product $product;
    public int $count;

    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->count = Session::get("products.{$product->id}");
    }

    public function render()
    {
        return view('components.product-row');
    }
}
