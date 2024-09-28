<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guared = ['id'] ;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'total_amount',
        'payment_mode',
        'payment_status',
        'extra_instructions',
        'order_status',
    ];

    public function userDetail()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function itemDetail()
    {
        return $this->hasMany(OrderItem::class, 'order_id','id');
    }
}
