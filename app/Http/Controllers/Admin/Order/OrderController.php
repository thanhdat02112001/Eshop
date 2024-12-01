<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('order_status', 0)->get();
        return view('backend.order.order', compact('orders'));
    }

    public function processed()
    {
        $orders = Order::where('order_status', '!=', 0)->orderBy('updated_at', 'DESC')->get();
        return view('backend.order.processed', compact('orders'));
    }

    public function newOrder()
    {
        return view('backend.order.new');
    }

    public function detail($id)
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

    public function collection()
    {
        // TODO: Implement collection() method.
        $orders = Order::whereMonth('created_at', Carbon::now()->month)->where('order_status', 1)->get()->toArray();
        return collect($orders);
    }

    // public function exportCSV() {
    //     return Excel::download(new Order(), 'order.xlsx');
    // }

    public function store(Request $request)
    {

        $cart = $request->input('cart');
        $total = 0;
        DB::beginTransaction();
        try {
            foreach ($cart as $item) {
                $product = Product::find($item['product_id']);

                if (!$product) {
                    return response()->json(['success' => false, 'message' => 'Product not found.']);
                }

                // Example: Validate stock and process order logic
                if ($product->quantity < $item['quantity']) {
                    return response()->json(['success' => false, 'message' => 'Insufficient stock for product ID ' . $product->id]);
                }

                // Deduct stock or create order logic here
                $product->decrement('quantity', $item['quantity']);
                $total += ($product->product_price * $item['quantity']);
            }
            $delivery =
                [
                    'delivery_email' => 'offline@gmail.com',
                    'delivery_phone' => '038550xxxx',
                    'delivery_address' => 'Ha Noi',
                    'delivery_note' => '',
                    'customer_name' => 'Offline',
                ];
            //insert order
            $delivery = Delivery::updateOrCreate(['delivery_email' => 'offline@gmail.com'], $delivery);
            $order =
                [
                    'order_code' => Carbon::now()->timestamp,
                    'order_status' => 1,
                    'order_total' => $total,
                    'payment_type' =>  1,
                    'created_at' => date('YmdHis'),
                    'delivery_id' => $delivery->id,
                ];
            $order = Order::create($order);


            foreach ($cart as $item) {
                $product = Product::find($item['product_id']);
                $order_detail =
                    [
                        'order_id' => $order->id,
                        'product_name' => $product->product_name,
                        'product_price' => $product->product_price,
                        'product_quantity' => $item['quantity'],
                    ];
                $order->orderDetails()->create($order_detail);

                //cap nhat so luong da ban
                $product->increment('product_sale', $item['quantity']);
            }
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Done']);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
