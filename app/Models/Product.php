<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'desc',
        'category_id',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}