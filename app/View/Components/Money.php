<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Money extends Component
{
    private int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function render()
    {
        return number_format($this->price / 100, 2) . ' LKR';
    }
}
