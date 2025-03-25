<?php

// JJVG, NCP

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data', []);

        if (! empty($cartProductData)) {
            $cartProducts = Product::whereIn('id', array_keys($cartProductData))->get()->keyBy('id');

            foreach ($cartProducts as $id => $product) {
                $product->quantity = $cartProductData[$id]['quantity'];
            }
        }

        $viewData = [];
        $viewData['cartProducts'] = $cartProducts;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $quantity = $request->input('quantity');
        $cartProductData = $request->session()->get('cart_product_data');
        $cartProductData[$id] = [
            'id' => $id,
            'quantity' => $quantity,
        ];
        $request->session()->put('cart_product_data', $cartProductData);

        return redirect()->back()->with('success', 'Product added successfully');
    }

    public function remove(string $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data', []);

        if (isset($cartProductData[$id])) {
            unset($cartProductData[$id]);
            $request->session()->put('cart_product_data', $cartProductData);
        }

        return back()->with('success', 'Product removed successfully ');
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');

        return back();
    }
}
