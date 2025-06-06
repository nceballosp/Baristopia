<?php

// JJVG, SCL

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function delete(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        Payment::destroy($id);

        return redirect()->route('order.index')->with('success', 'Order deleted successfully');
    }

    public function index(): View
    {
        return view('payment.index');
    }

    public function summary(string $id): View
    {
        $payment = Payment::findOrFail($id);
        $order = Order::findOrFail($payment->getOrderId());

        $viewData = [];
        $viewData['payment'] = $payment;
        $viewData['order'] = $order;

        return view('payment.summary')->with('viewData', $viewData);
    }

    public function pdf(string $id)
    {
        $payment = Payment::findOrFail($id);
        $order = Order::findOrFail($payment->order_id);

        $viewData = [
            'payment' => $payment,
            'order' => $order,
        ];

        $pdf = Pdf::loadView('payment.pdf', compact('viewData'));

        return $pdf->download("payment_receipt_{$id}.pdf");
    }

    public function process(Request $request): RedirectResponse
    {
        Payment::validate($request);
        $paymentSuccess = true;

        if ($paymentSuccess) {
            $paymentData = $request->only(['method', 'order_id']);
            $paymentData['status'] = 'Completed';
            $payment = Payment::create($paymentData);

            $order = Order::find($request->input('order_id'));

            if ($order) {
                foreach ($order->getItems() as $item) {
                    $product = $item->getProduct();

                    if ($product) {
                        $newStock = $product->getStock() - $item->getQuantity();
                        $product->setStock($newStock);
                        $product->save();
                    }
                }
            }

            return redirect()->route('payment.summary', ['id' => $payment->getId()])
                ->with('success', __('messages.payProcessSuccess'));
        }

        return back()->with('error', __('messages.payProcessFail'));
    }
}
