<?php

// JJVG, SCL, NCP

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(Request $request): RedirectResponse
    {
        $totalPrice = 0;
        $cartProductData = $request->session()->get('cart_product_data', []);

        if (empty($cartProductData)) {
            return redirect()->back()->with('error', __('messages.emptyCar'));
        }

        foreach ($cartProductData as $productId => $data) {
            $product = Product::find($productId);
            if ($product) {
                $totalPrice += $product->getPrice() * $data['quantity'];
            }
        }

        $totalQuantity = array_sum(array_column($cartProductData, 'quantity'));

        $order = Order::create([
            'total_quantity' => $totalQuantity,
            'total' => $totalPrice,
            'user_id' => Auth::id(),
        ]);

        foreach ($cartProductData as $productId => $data) {
            $product = Product::find($productId);
            if ($product) {
                Item::create([
                    'order_id' => $order->getId(),
                    'product_id' => $product->getId(),
                    'quantity' => $data['quantity'],
                    'sub_total' => $product->getPrice() * $data['quantity'],
                ]);
            }
        }

        session()->forget('cart_product_data');

        return redirect()->route('payment.index')->with('order_id', $order->getId());
    }
}
