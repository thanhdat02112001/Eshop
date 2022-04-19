<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index () {
        $orders = Order::all()->where('status', 0);
        return view('backend.order.order', compact('orders'));
    }

    public function processed () {
        return view('backend.order.processed');
    }

    public function detail ($id)
    {
        $order = Order::find($id);
        return view('backend.order.detailorder', compact('order'));
    }

    public function postDetail () {

    }
}
