<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantMaster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'restaurant_master';
    protected $guared = ['id'];

    protected $fillable = [
        'name',
        'email',
        'user_id',
        'address',
        'city',
        'zip_code',
        'state',
        'country',
        'contact_number',
        'open_at',
        'close_at',
        'description',
        'is_closed',
        'latitude',
        'longitude'
    ];

    public function userDetail()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function hasCountry()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }
}
