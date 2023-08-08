<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'nameCategory',
        'slug',
        'created_at',
        'updated_at',
    ];
    public function product_cats()
    {
        return $this->hasMany(Products::class,'product_cat_id');
    }
}
