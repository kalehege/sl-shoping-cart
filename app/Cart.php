<?php declare(strict_types=1);

namespace App;

use ApiChef\PayHere\Item;
use ApiChef\PayHere\Items;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class Cart
{
    private Collection $products;
    private array $itemsInCart;

    public function __construct(array $itemsInCart)
    {
        $this->itemsInCart = $itemsInCart;
        $this->products = Product::query()->findMany(array_keys($this->itemsInCart));
    }

    public static function make(array $itemsInCart): self
    {
        return new self($itemsInCart);
    }

    public function products(): Collection
    {
        return $this->products;
    }

    public function items(): Items
    {
        $items = $this->products->map(fn (Product $product) =>
            new Item((string) $product->id, $product->name, $product->price / 100, $this->itemsInCart[$product->id])
        )->all();

        return new Items(...$items);
    }

    public function total(): int
    {
        return $this->products->sum(fn (Product $product) =>
            $product->priceFor($this->itemsInCart[$product->id])
        );
    }
}
