<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Notifications\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** 
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user's primary key (id)
     * $this->attributes['username'] - string - contains the user's username
     * $this->attributes['name'] - string - contains the users's first name 
     * $this->attributes['last_name'] - string - contains the users's last name 
     * $this->attributes['email'] - string contains the user's email
     * $this->attributes['password'] - string - contains the users's password 
     * $this->recipes - Recipe[] contains the associated Recipes
     * $this->orders - Order[] - contains the associated Orders
     * $this->products - Product[] - contains the associated Products
    */

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['username', 'name', 'last_name', 'email', 'password',];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['password','remember_token',];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUserName(): string
    {
        return $this->attributes['username'];
    }

    public function setUserName(string $username) : void
    {
        $this->attributes['username'] = $username;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name) : void
    {
        $this->attributes['name'] = $name;
    }

    public function getLastName(): string
    {
        return $this->attributes['last_name'];
    }

    public function setLastName(string $lastName) : void
    {
        $this->attributes['last_name'] = $lastName;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email) : void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password) : void
    {
        $this->attributes['password'] = $password;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->attributes['updated_at'];
    }

    public function getEmailVerifiedAt(): \DateTime
    {
        return $this->attributes['email_verified_at'];
    }

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

}
