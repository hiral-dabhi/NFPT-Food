<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $table = 'currency';
    protected $guared = ['id'] ;

    protected $fillable = [
        'country_id',
        'title',
        'sign',
        'image',
        'status',
    ];

    public function countryName()
    {
        return $this->belongsTo(Country::class, 'country_id','id');
    }
}
