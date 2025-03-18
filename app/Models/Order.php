<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;  

class Order extends Model  
{  
    /** 
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order's primary key (id)
     * $this->attributes['summary'] - string - contains the order summary
     * $this->attributes['total'] - int - contains the order's total price 
     * $this->attributes['total_quantity'] - int - contains the order's total quantity of items 
     * $this->user - User - contains the associated User 
     * $this->payment - Payment - contains the associated Payment
     * $this->items - Item[] - contains the associated Items
     */

    use HasFactory;
    
    protected $fillable = ['summary', 'total_quantity', 'user_id', 'payment_id'];  

    public function getId(): int  
    {  
        return $this->attributes['id'];  
    }  

    public function getSummary(): string  
    {  
        return $this->attributes['summary'];  
    }  
    
    public function setSummary(string $summary): void  
    {  
        $this->attributes['summary'] = $summary;  
    }  
    
    public function getTotal(): int  
    {  
        return $this->attributes['total'];  
    }  
    
    public function setTotal(int $total): void  
    {  
        $this->attributes['total'] = $total;  
    }  
    
    public function getTotalQuantity(): int  
    {  
        return $this->attributes['total_quantity'];  
    }  

    public function setTotalQuantity($totalQuantity): void  
    {  
        $this->attributes['total_quantity'] = $totalQuantity;  
    } 
    
    public function getCreatedAt(): \DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): \DateTime
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

    public function getItems(): Item  
    {  
        return $this->items;  
    }   
}  
