<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item's primary key (id)
     * $this->attributes['quantity'] - int - contains the item's quantity
     * $this->attributes['subTotal'] - int - contains the item's subtotal
     */

    protected $fillable = ['quantity', 'ingredients', 'description', 'image'];

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
        $this->attributes['subTotal'] = $subTotal;
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
