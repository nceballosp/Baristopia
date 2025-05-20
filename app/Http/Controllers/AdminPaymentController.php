<?php

// NCP

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Payment;
use Illuminate\View\View;

class AdminPaymentController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['payments'] = Payment::all();

        return view('admin.payment.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];

        return view('admin.payment.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Payment::validate($request);

        $productData = $request->only(['name', 'price', 'description', 'ingredients']);
       

        Payment::create($productData);

        return redirect()->route('admin.payment.create')->with('success', 'Payment created successfully');
    }

    public function show(string $id): View
    {
        $viewData = [];
        $payment = Payment::findOrFail($id);
        $viewData['payment'] = $payment;

        return view('admin.payment.show')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payment.index')->with('success', 'payment created successfully');
    }

}