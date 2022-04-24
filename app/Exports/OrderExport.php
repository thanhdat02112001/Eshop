<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::whereMonth('created_at', Carbon::now()->month)->where('order_status', 1)->get();
        return $orders;
    }
}
