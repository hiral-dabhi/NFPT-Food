<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffHasRestaurant extends Model
{
    use HasFactory;

    protected $table = 'staff_has_restaurant';
    protected $guared = ['id'];
    protected $fillable = [
        'staff_id',
        'restaurant_id',
    ];

    public function restaurantDetail()
    {
        return $this->belongsTo(RestaurantMaster::class, 'restaurant_id','id');
    }
}
