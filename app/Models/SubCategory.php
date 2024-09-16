<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'sub_category';
    protected $guared = ['id'] ;

    protected $fillable = [
        'category_id',
        'title',
        'type',
        'tag',
        'status',
        'description',
    ];
    
    public function categoryDetail()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
