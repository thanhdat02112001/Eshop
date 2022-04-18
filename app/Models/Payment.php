<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = ['money', 'vnp_response_code', 'code_vnpay', 'code_bank', 'time', 'delivery_id', 'user_id'];
}
