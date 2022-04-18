<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';
    protected $fillable = ['product_name', 'product_price', 'product_quantity', 'order_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
