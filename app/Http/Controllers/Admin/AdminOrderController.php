<?php

// NCP

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('admin.order.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Order::validate($request);
        $orderData = $request->only(['total', 'total_quantity']);

        Order::create($orderData);

        return redirect()->route('admin.order.create')->with('success', 'order created successfully');
    }

    public function show(string $id): View
    {
        $viewData = [];
        $order = Order::findOrFail($id);
        $viewData['order'] = $order;

        return view('admin.order.show')->with('viewData', $viewData);
    }

    public function delete(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        Order::destroy($id);

        return redirect()->route('admin.order.index');
    }

    public function edit(string $id): View
    {
        $order = Order::findOrFail($id);
        $viewData['order'] = $order;

        return view('admin.order.edit')->with('viewData', $viewData);
    }

    public function update(Request $request): RedirectResponse
    {
        $id = $request->input('id');

        Order::validate($request);

        $order = Order::findOrFail($id);
        $order->setTotal($request->input('total'));
        $order->setTotalQuantity($request->input('total_quantity'));
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Order updated successfully');
    }
}
