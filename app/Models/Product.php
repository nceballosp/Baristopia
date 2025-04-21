<?php

// NCP

namespace App\Models;

use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Product extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product's primary key (id)
     * $this->attributes['name'] - string - contains the product's name
     * $this->attributes['description'] - string - contains the products's description
     * $this->attributes['price'] - float contains the product's price
     * $this->attributes['image'] - string - contains the products's image
     * $this->attributes['stock'] - int contains the product's stock
     * $this->user - User - contains the associated User
     * $this->items - Item[] - contains the associated Items
     */
    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required | gt:0',
            'description' => 'required',
            'stock' => 'required | gt:0',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
    }

    protected $fillable = ['name', 'price', 'description', 'image', 'stock'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
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

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->item;
    }
}
