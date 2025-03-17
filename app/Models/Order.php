<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  

class Order extends Model  
{  
    protected $fillable = ['summary', 'cantidadTotal', 'user_id', 'payment_id'];    

    public function payment()  
    {  
        return $this->hasOne(Payment::class);  
    }  

    public function items()  
    {  
        return $this->hasMany(Item::class);  
    }  
    
    public function user()  
    {  
        return $this->belongsTo(User::class);  
    }  

    // Getters  
    public function getId()  
    {  
        return $this->attributes['id'];  
    }  

    public function getSummary()  
    {  
        return $this->attributes['summary'];  
    }  

    public function getCantidadTotal()  
    {  
        return $this->attributes['cantidadTotal'];  
    }  

    public function getUser()  
    {  
        return $this->user()->first();  
    }  

    public function getPayment()  
    {  
        return $this->payment;  
    }  

    public function getItems()  
    {  
        return $this->items;  
    }  

    // Setters  
    public function setSummary($summary)  
    {  
        $this->attributes['summary'] = $summary;  
    }  

    public function setCantidadTotal($cantidadTotal)  
    {  
        $this->attributes['cantidadTotal'] = $cantidadTotal;  
    }  

    public function setUser(User $user)  
    {  
        $this->user_id = $user->id;  
    }  

    public function setPayment(Payment $payment)  
    {  
        $this->payment_id = $payment->id;  
    }  

    // Método para calcular el total  
    public function calculateTotal()  
    {  
        $total = 0;  
        foreach ($this->items as $item) {  
            $total += $item->price * $item->quantity; // Asegúrate de que estos atributos existan en tu modelo `Item`  
        }  
        $this->cantidadTotal = $total;  
        return $total;  
    }  
}  
