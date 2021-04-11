<?php declare(strict_types=1);

namespace App\Http\Controllers;

use ApiChef\PayHere\Payment;
use App\Actions\OpenOrder;
use App\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function show(Request $request, OpenOrder $openOrder)
    {
        $order = $openOrder->execute($request->user());
        $itemsInCart = Session::get('products', []);
        foreach ($itemsInCart as $productId => $quantity) {
            $order->products()->attach($productId, ['quantity' => $quantity]);
        }
        $cart = Cart::make($itemsInCart);
        $payment = Payment::make($order, $request->user(), $cart->total() / 100);

        return view('checkout', [
            'cart' => $cart,
            'order' => $order,
            'payment' => $payment,
        ]);
    }

    public function success(Request $request)
    {
        $payment = Payment::findByOrderId($request->get('order_id'));

        if ($payment->isPaid()) {
            /** @var Order $order */
            $order = $payment->payable;
            // update inventory
        }

        // perform the side effects of successful payment

        // redirect to payment success page or respond success
    }

    public function cancelled(Request $request)
    {
        $payment = Payment::findByOrderId($request->get('order_id'));

        /** @var Order $order */
        $order = $payment->payable;

        // perform the side effects of cancelled payment

        // redirect to payment cancelled page or respond payment failed
    }
}
