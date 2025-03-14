<?php  


namespace App\Http\Controllers;  

use App\Models\Payment;  
use Illuminate\Http\Request;  
use Illuminate\View\View;  

class PaymentController extends Controller  
{  
    public function index(): View  
    {  
    $payments = Payment::all();  
    $viewData = [];  
    $viewData['title'] = 'Lista de Pagos'; // Agrega un título  
    $viewData['subtitle'] = 'Pagos realizados'; // Agrega un subtítulo  
    $viewData['payments'] = $payments; // Asegúrate de pasar los pagos  

    return view('payment.index')->with('viewData', $viewData); // Cambiado a payment.index  
    }

    public function create(): View  
    {  
        $viewData = [];
        $viewData['title'] = '';
        $viewData['subtitle'] = '';
        return view('payment.create')->with('viewData', $viewData);
    }  

    public function store(Request $request)  
    {  
        $request->validate([  
            'method' => 'required|string',  
            'status' => 'required|string',  
            'order' => 'required|string'  
        ]);  

        Payment::create([  
            'method' => $request->method,  
            'status' => $request->status,  
            'order' => $request->order  
        ]);  

        return redirect()->route('payment.index')->with('success', 'Payment created correctly.');  
    }  

    public function destroy(String $id)  
    {  
         
        $payment = Payment::find($id);  

        
        if (!$payment) {  
            return redirect()->route('payment.index')->with('error', 'Payment has not been found.');  
        }  

          
        $payment->delete();  

         
        return redirect()->route('payment.index')->with('success', 'Payment deleted correctly');  
    }  

    public function show(String $id)  
    {  
        $payment = Payment::findOrFail($id);

        $viewData = [];
        $viewData ['payments'] = $payment;
        return view('payment.show')->with('viewData', $viewData);
    }
}
