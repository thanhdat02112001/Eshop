<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "product_image";
    protected $fillable = ["image1", "image2", "image3", "image4", "image5", "total_image"];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
