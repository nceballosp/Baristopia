<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  

class Payment extends Model  
{  
    use HasFactory;  

 
    protected $fillable = ['method', 'status', 'order', 'id'];  

    public function getMethod():String{
        return $this -> attributes['method'];
    }

    public function setMethod(String $payment_method){
        $this -> attributes['method'];
    }

    public function getStatus():String{
        return $this -> attributes['status'];
    }
