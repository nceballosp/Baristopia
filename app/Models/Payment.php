<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;  

class Payment extends Model  
{  
    /** 
     * PAYMENT ATTRIBUTES
     * $this->attributes['id'] - int - contains the payment's primary key (id)
     * $this->attributes['method'] - string - contains the payment method
     * $this->attributes['status'] - string - contains the payment's status 
    */
    
    use HasFactory;

    public static function validate(Request $request): void
    {
        $request -> validate([
            'method'=> 'required',
        ]);
    }

    protected $fillable = ['method', 'status', 'order'];  

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getMethod(): string
    {
        return $this->attributes['method'];
    }

    public function setMethod(string $method): void          
    {
        $this->attributes['method'] = $method;
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->attributes['updated_at'];
    }
}