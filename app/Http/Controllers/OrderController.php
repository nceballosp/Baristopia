<?php  

namespace App\Http\Controllers;  

use App\Models\Order;  
use Illuminate\Http\RedirectResponse;  
use Illuminate\Http\Request;  
use Illuminate\View\View;  

class OrderController extends Controller{  
    public function index(): View{  
        $viewData = [];  
        $viewData['orders'] = Order::all();  
        return view('order.index')->with('viewData', $viewData);  
    }  

    public function show(string $id): View{  
        $viewData = [];  
        $order = Order::findOrFail($id);  
        $viewData['order'] = $order;  
        return view('order.show')->with('viewData', $viewData);  
    }  

    public function delete(Request $request): RedirectResponse{  
        $id = $request->input('id');  
        Order::destroy($id);  
        return redirect()->route('order.index')->with('success', 'Order deleted successfully');  
    }  

    public function create(): View{  
        return view('order.create');  
    }  

    public function save(Request $request): RedirectResponse{   
        $this->validate($request, [  
            'summary' => 'required|string',  
            'total_quantity' => 'required|integer',  
            'user' => 'required|exists:users,id',    
            'payment' => 'required|exists:payments,id', 
        ]);  

        $orderData = $request->only(['summary', 'total_quantity', 'user', 'payment']);  
        $orderData['items'] = $request->input('items', []); 

        Order::create($orderData);  

        return redirect()->route('order.create')->with('success', 'Order created successfully');  
    }  

    public function update(Request $request, string $id): RedirectResponse{  
        $this->validate($request, [  
            'summary' => 'required|string',  
            'total_quantity' => 'required|integer',   
        ]);  

        $order = Order::findOrFail($id);  
        $order->update($request->only(['summary', 'total_quantity', 'user', 'payment', 'items']));  

        return redirect()->route('order.show', $id)->with('success', 'Order updated successfully');  
    }  
}  
