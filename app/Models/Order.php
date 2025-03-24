<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order's primary key (id)
     * $this->attributes['total'] - int - contains the order's total price
     * $this->attributes['total_quantity'] - int - contains the order's total quantity of items
     * $this->user - User - contains the associated User
     * $this->payment - Payment - contains the associated Payment
     * $this->items - Item[] - contains the associated Items
     */
    use HasFactory;

    public static function validate(Request $request): void
    {
        $request->validate([
            'summary' => 'required|string',
            'total_quantity' => 'required|integer',
            'user' => 'required|exists:users,id',
            'payment' => 'required|exists:payments,id',
        ]);
    }

    protected $fillable = ['summary', 'total_quantity', 'total', 'user_id', 'payment_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTotal(): float
    {
        return $this->attributes['total'];
    }

    public function setTotal(float $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getTotalQuantity(): float
    {
        return $this->attributes['total_quantity'];
    }

    public function setTotalQuantity(float $totalQuantity): void
    {
        $this->attributes['total_quantity'] = $totalQuantity;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->attributes['updated_at'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function getPayment(): Payment
    {
        return $this->payment;
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }
}
