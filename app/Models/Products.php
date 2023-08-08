<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'nameProducts',
        'slug',
        'imgProducts',
        'priceProducts',
        'descProducts',
        'product_cat_id',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'product_cat_id');
    }
}
