<?php

// SCL

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Payment extends Model
{
    /**
     * PAYMENT ATTRIBUTES
     * $this->attributes['id'] - int - contains the payment's primary key (id)
     * $this->attributes['method'] - string - contains the payment method
     * $this->attributes['status'] - string - contains the payment's status
     * $this->order - Order - contains the associated order
     */
    use HasFactory;

    public static function validate(Request $request): void
    {
        $request->validate([
            'method' => 'required',
        ]);
    }

    protected $fillable = ['method', 'status', 'order_id'];

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

    public function getCreatedAt(): DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->attributes['updated_at'];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function getOrder(): Order
    {
        return $this->order;
    }
}
