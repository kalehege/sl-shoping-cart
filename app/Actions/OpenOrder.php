<?php declare(strict_types=1);

namespace App\Actions;

use App\Models\Order;
use App\Models\User;

class OpenOrder
{
    public function execute(User $user): Order
    {
        /** @var Order $order */
        $order = Order::query()
            ->where('user_id', $user->id)
            ->whereNull('checkout_at')
            ->first();

        if ($order !== null) {
            $order->products()->detach();

            return $order;
        }

        $order = new Order();
        $user->orders()->save($order);

        return $order;
    }
}
