<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['order_status', 'order_total', 'payment_type', 'delivery_id','order_code', ];

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(Order_Detail::class);
    }
}
