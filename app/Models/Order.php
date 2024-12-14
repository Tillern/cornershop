<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        'user_id',          // The user placing the order
        'status',           // Order status (e.g., pending, completed, canceled)
        'total_price',      // Total price of the order
        'address',          // Shipping address for the order
        'payment_method',   // Payment method (e.g., credit card, PayPal, etc.)
        'payment_status',   // Payment status (e.g., paid, pending)
    ];

    // Define relationships

    /**
     * The user who placed the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The items in the order (products purchased).
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the total price of the order, including taxes and shipping if needed.
     */
    public function getTotalPriceAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->quantity * $item->price;
        });
    }

    /**
     * Get the order status as a readable string.
     */
    public function getStatusLabelAttribute()
    {
        $statuses = [
            'pending' => 'Pending',
            'completed' => 'Completed',
            'canceled' => 'Canceled',
        ];

        return $statuses[$this->status] ?? 'Unknown';
    }

    /**
     * Define the shipping address for the order.
     */
    public function shippingAddress()
    {
        return $this->hasOne(Address::class);
    }
}
