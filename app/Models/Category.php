<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'category_master';
    protected $guared = ['id'] ;

    protected $fillable = [
        'country_id',
        'title',
        'status',
    ];
    public function countryDetail()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
}
