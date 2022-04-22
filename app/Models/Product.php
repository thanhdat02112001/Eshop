<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';
    protected $fillable =
    [
        'product_code',
        'product_name',
        'product_description',
        'product_picture',
        'product_status',
        'product_sale',
        'category_id',
        'product_brand',
        'product_price',
        'quantity',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function image() {
        return $this->hasOne(Image::class);
    }

    public function getRateAttribute () {
        $rates = Rate::where('product_id', $this->id)->get();
        $total = 0;
        foreach ($rates as $rate) {
            $total += $rate->rate_number;
        }

        count($rates) > 0 ? $star = round($total/count($rates)) : $star = 0;
        return $star ;
    }
}
