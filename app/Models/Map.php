<?php

// JJVG

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Map extends Model
{
    /**
     * MAP ATTRIBUTES
     * $this->attributes['id'] - int - contains the map's primary key (id)
     * $this->attributes['name'] - string - contains the map's name
     * $this->attributes['description'] - string - contains the map's description
     * $this->attributes['address'] - string - contains the map's address
     * $this->attributes['latitude'] - float - contains the map's latitude
     * $this->attributes['longitude'] - float - contains the map's longitude
     * $this->attributes['image'] - string - contains the map's image url
     * $this->attributes['phone'] - string - contains the map's phone number
     * $this->attributes['opening_hours'] - string - contains the map's opening hours
     * $this->user - User - contains the associated User
     */
    protected $fillable = ['name', 'description', 'address', 'latitude', 'longitude', 'image', 'phone', 'opening_hours'];

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

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getLatitude(): float
    {
        return $this->attributes['latitude'];
    }

    public function setLatitude(float $latitude): void
    {
        $this->attributes['latitude'] = $latitude;
    }

    public function getLongitude(): float
    {
        return $this->attributes['longitude'];
    }

    public function setLongitude(float $longitude): void
    {
        $this->attributes['longitude'] = $longitude;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getPhone(): string
    {
        return $this->attributes['phone'];
    }

    public function setPhone(string $phone): void
    {
        $this->attributes['phone'] = $phone;
    }

    public function getOpeningHours(): string
    {
        return $this->attributes['opening_hours'];
    }

    public function setOpeningHours(string $openingHours): void
    {
        $this->attributes['opening_hours'] = $openingHours;
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
}
