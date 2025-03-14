<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * RECIPE ATTRIBUTES
     * $this->attributes['id'] - int - contains the recipe's primary key (id)
     * $this->attributes['name'] - string - contains the recipe's name
     * $this->attributes['ingredients'] - string - contains the recipe's ingredients
     * $this->attributes['description'] - string - contains the recipe's description
     * $this->attributes['image'] - string - contains the recipe's image url
     */

    protected $fillable = ['name', 'ingredients', 'description', 'image'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
    }

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

    public function getIngredients(): string
    {
        return $this->attributes['ingredients'];
    }

    public function setIngredients(string $ingredients): void
    {
        $this->attributes['ingredients'] = $ingredients;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription($description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
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
