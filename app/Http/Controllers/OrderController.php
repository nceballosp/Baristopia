<?php  

namespace App\Http\Controllers;  

use App\Models\Item;
use App\Models\Order;  
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;  

class OrderController extends Controller
{  
    public function index(): View
    {  
        $viewData = [];  
        $viewData['orders'] = Order::all();  
        return view('order.index')->with('viewData', $viewData);  
    }  

    public function show(string $id): View
    {  
        $viewData = [];  
        $order = Order::findOrFail($id);  
        $viewData['order'] = $order;  
        return view('order.show')->with('viewData', $viewData);  
    }  

    public function delete(Request $request): RedirectResponse
    {  
        $id = $request->input('id');  
        Order::destroy($id);  
        return redirect()->route('order.index')->with('success', 'Order deleted successfully');  
    }  

    public function create(): View
    {  
        return view('order.create');  
    }  

    public function save(Request $request): RedirectResponse
    {   
        Order::validate($request);
        $orderData = $request->only(['summary', 'total_quantity', 'user', 'payment']);  
        $orderData['items'] = $request->input('items', []); 

        Order::create($orderData);  

        return redirect()->route('order.create')->with('success', 'Order created successfully');  
    }  

    public function update(Request $request, string $id): RedirectResponse
    {  
        Order::validate($request);
        $order = Order::findOrFail($id);  
        $order->update($request->only(['summary', 'total_quantity', 'user', 'payment', 'items']));  

        return redirect()->route('order.show', $id)->with('success', 'Order updated successfully');  
    }  

    public function checkout(Request $request): RedirectResponse
    {
        $totalPrice = 0;
        $cartProductData = $request->session()->get('cart_product_data', []);

        if (empty($cartProductData)) 
        {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        $cartProducts = Product::whereIn('id', array_keys($cartProductData))->get();

        foreach ($cartProductData as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $totalPrice += $product->getPrice() * $quantity;
            }
        }

        $total = $totalPrice;
        $totalQuantity = $cartProducts->count();

        $summary = "hola";

        $order = Order::create([
            'summary' => $summary,
            'total_quantity' => $totalQuantity,
            'total' => $total ,
            'user_id' => Auth::id(),
        ]);

        $total = 0;

        foreach ($cartProductData as $productId) {
            $product = Product::find($productId);
            if ($product) {
                Item::create([
                    'order_id' => $order->getId(),
                    'product_id' => $product->getId(),
                    'quantity' => 1, 
                    'sub_total' => $product->getPrice(),
                ]);
                $total += $product->getPrice();
            }
        }

        session()->forget('cart_product_data');

        return redirect()->route('payment.index');
    }
}  
