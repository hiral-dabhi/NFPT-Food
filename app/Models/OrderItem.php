<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $guared = ['id'] ;

    protected $fillable = [
        'order_id',
        'dish_id',
        'quantity',
        'price',
    ];
    public function menuDetail()
    {
        return $this->belongsTo(Menu::class, 'dish_id','id');
    }
}
