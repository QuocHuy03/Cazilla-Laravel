<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_orders extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products_order';
    protected $fillable = [
        'orders_id',
        'orders_random',
        'product_id',
        'product_name',
        'product_img',
        'product_qty',
        'product_price',
    ];
    public function orders()
    {
        return $this->belongsTo(Orders::class, 'id');
    }
}
