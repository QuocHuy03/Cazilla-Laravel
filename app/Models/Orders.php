<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'user_order',
        'random_order',
        'status_order',
        'created_at',
        'updated_at',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_order');
    }
    public function product_orders()
    {
        return $this->hasMany(Product_orders::class);
    }
}
