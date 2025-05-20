<?php

//NCP

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Order;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['orders'] = Order::all();

        return view('admin.order.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];

        return view('admin.order.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Order::validate($request);
        $productData = $request->only(['name', 'price', 'description', 'ingredients']);

        Order::create($productData);

        return redirect()->route('admin.order.create')->with('success', 'order created successfully');
    }

    public function show(string $id): View
    {
        $viewData = [];
        $order = Order::findOrFail($id);
        $viewData['order'] = $order;

        return view('admin.order.show')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.order.index')->with('success', 'order created successfully');
    }

}