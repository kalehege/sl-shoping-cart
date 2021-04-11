<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $prices = range(85000, 150000, 50);

        return [
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->randomElement($prices),
            'quantity_in_hand' => $this->faker->numberBetween(5, 50),
        ];
    }
}
