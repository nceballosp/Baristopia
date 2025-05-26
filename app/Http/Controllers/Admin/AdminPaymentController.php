<?php

// NCP

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('admin.payment.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Payment::validate($request);

        $productData = $request->only(['method', 'status']);

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

    public function delete(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        Payment::destroy($id);

        return redirect()->route('admin.payment.index');
    }

    public function edit(string $id): View
    {
        $payment = Payment::findOrFail($id);
        $viewData['payment'] = $payment;

        return view('admin.payment.edit')->with('viewData', $viewData);
    }

    public function update(Request $request): RedirectResponse
    {
        $id = $request->input('id');

        Payment::validate($request);

        $payment = Payment::findOrFail($id);
        $payment->setMethod($request->input('method'));
        $payment->setStatus($request->input('status'));
        $payment->save();

        return redirect()->route('admin.payment.index')->with('success', 'payment updated successfully');
    }
}
