<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item's primary key (id)
     * $this->attributes['quantity'] - int - contains the item's quantity
     * $this->attributes['sub_total'] - int - contains the item's subtotal
     * &this->product - Product - contains the associated product
     * $this->order - Order - contains the associates Order
     */
    use HasFactory;

    public static function validate(Request $request): void
    {
        $request->validate([
            'quantity' => 'required',
        ]);
    }

    protected $fillable = ['sub_total', 'quantity', 'product_id', 'order_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getSubTotal(): int
    {
        return $this->attributes['subTotal'];
    }

    public function setSubTotal(int $subTotal): void
    {
        $this->attributes['sub_total'] = $subTotal;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->attributes['updated_at'];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function getProduct(): Product
    {
        return $this->product;
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
        return $this->product;
    }
}
