<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index () {
        $orders = Order::where('order_status', 0)->get();
        return view('backend.order.order', compact('orders'));
    }

    public function processed () {
        $orders = Order::where('order_status', '!=', 0)->orderBy('updated_at', 'DESC')->get();
        return view('backend.order.processed', compact('orders'));
    }

    public function detail ($id)
    {
        $order = Order::find($id);
        return view('backend.order.detailorder', compact('order'));
    }

    public function update($id)
    {
        $status =
        [
            'order_status' => 1,
        ];
        $order = Order::find($id);
        if ($order->update($status)) {
            return redirect()->route('order.index')->with('success', 'Đơn hàng đã được xử lý');
        }
        return redirect()->route('order.index')->with('error', 'Đã xảy ra lỗi');
    }

    public function destroy($id)
    {
        $destroy = [
            'order_status' => 2,
        ];
        $order = Order::find($id);
        if ($order->update($destroy)) {
            return redirect()->route('order.index')->with('success', 'Đơn hàng đã được hủy');
        }
        return redirect()->route('order.index')->with('error', 'Đã xảy ra lỗi');
    }
}
