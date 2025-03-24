<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        return view('payment.index');
    }

    public function process(Request $request): RedirectResponse
    {
        Payment::validate($request);
        $paymentSuccess = true;
        if ($paymentSuccess) {
            return redirect()->back()->with('success', 'Payment successful! Your order is confirmed.');
        }

        return back()->with('error', 'Payment failed. Please try again.');

    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = '';
        $viewData['subtitle'] = '';

        return view('payment.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Payment::validate($request);
        Payment::create($request->only(['method', 'status']));

        return redirect()->route('payment.index')->with('success', 'Payment created correctly.');
    }

    public function delete(string $id): RedirectResponse
    {
        $payment = Payment::find($id);

        if (! $payment) {
            return redirect()->route('payment.index')->with('error', 'Payment has not been found.');
        }

        $payment->delete();

        return redirect()->route('payment.index')->with('success', 'Payment deleted correctly');
    }

    public function show(string $id): View
    {
        $payment = Payment::findOrFail($id);

        $viewData = [];
        $viewData['payments'] = $payment;

        return view('payment.show')->with('viewData', $viewData);
    }
}
