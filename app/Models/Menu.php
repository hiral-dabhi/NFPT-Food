<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'menus';
    protected $guared = ['id'] ;

    protected $fillable = [
        'restaurant_id',
        'category_id',
        'sub_category_id',
        'title',
        'price',
        'image',
        'type',
        'tag',
        'in_stock',
        'status',
        'description',
    ];
    public function categoryDetail()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subCategoryDetail()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
}
