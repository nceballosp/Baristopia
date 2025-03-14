<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** 
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product's primary key (id)
     * $this->attributes['name'] - string - contains the product's name
     * $this->attributes['description'] - string - contains the products's description 
     * $this->attributes['price'] - int contains the product's price
     * $this->attributes['image'] - string - contains the products's image 
     * $this->attributes['stock'] - int contains the product's stock
    */
    
    public static function validate(Request $request): void
    {
        $request -> validate([
            'name'=> 'required',
            'price' => 'required | gt:0',
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

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
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

    public function getCreatedAt(): \DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->attributes['updated_at'];
    }
}
