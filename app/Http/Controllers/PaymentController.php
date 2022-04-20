<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customers')->user();
        return view("frontend.checkout", compact('customer'));
    }

    public function store(PaymentRequest $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = $request->all();
        $customer = Auth::guard('customers')->user();
        $data['total_money'] = str_replace(',', '', $data['total']);
        $data['created_at'] = date('YmdHis');
        if ($request->paymentMethod == 'vnpay') {
            session()->put('customer_information', $data);
            $totalMoney = $data['total_money'];
            return view('vnpay.index', compact('totalMoney'));
        } else {
            //insert delivery
            $delivery =
            [
                'delivery_email' => $data['email'],
                'delivery_phone' => $data['phone'],
                'delivery_address' => $data['address'],
                'delivery_note' => $data['note'],
            ];
            //insert order
            if ($customer) {
                $delivery = $customer->deliveries()->create($delivery);
            } else {
                $delivery = Delivery::create($delivery);
            }
            if($delivery) {
                $order =
                [
                    'order_code' => date("Ymd").$delivery->id,
                    'order_status' => 0,
                    'order_total' => $data['total'],
                    'payment_type' => $data['paymentMethod'],
                    'created_at' => date('YmdHis'),
                ];
                $delivery = Delivery::orderBy('id', 'DESC')->first();
            }
            if($delivery->order()->create($order)) {
                //insert order-detail
                $carts = session('cart');
                foreach ($carts as $id => $cart) {
                $order_detail =
                [
                    'order_id' => $delivery->order->id,
                    'product_name' => $cart['name'],
                    'product_price' => $cart['price'],
                    'product_quantity' => $cart['quantity'],
                ];
                $delivery->order->orderDetails()->create($order_detail);

                //cap nhat so luong da ban

                $product_sale_old = Product::find($id)->value('product_sale');
                $product_sale_new = $product_sale_old + $cart['quantity'];
                Product::find($id)->update(
                    [
                        'product_sale' => $product_sale_new,
                    ]
                );
                $cart_array[] = array(
                    'product_name' => $cart['name'],
                    'product_price' => $cart['price'],
                    'product_quantity' => $cart['quantity'],
                );
                }



            // gửi mail
            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            $orderIdFormat = date('dmY') . $delivery->order->id;
            $title_mail = "Đơn hàng xác nhận ngày " . $now;
            $shipping_array = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'note' => $data['note'],
                'payment_type' => $data['paymentMethod'],
                'order_id' => $orderIdFormat,
            );


            Mail::send(
                'mail.mail-order',
                [
                    'carts' => $cart_array,
                    'shipping' => $shipping_array,
                ],
                function ($message) use ($title_mail, $data) {
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'], $title_mail);
                }
            );
                Session::flash('success', 'Đơn hàng của bạn đã được lưu');
                session()->forget('cart');
                return redirect('/');
            } else {
                Session::flash('error', 'Đã xảy ra lỗi');
                return redirect('/');
            }
        }
    }

    public function vnpay()
    {
        $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate"=>$vnp_ExpireDate,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }


        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, env('VNP_HASH_SECRET'));
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            return redirect($vnp_Url);
        } else {
            echo json_encode($returnData);
        }
    }

    public function vnpayReturn(Request $request)
    {
        if (session()->has('customer_information') && $request->vnp_ResponseCode == '00') {
            $customer = Auth::guard('customers')->user();
            $vnp_data = $request->all();
            $data = session('customer_information');
            $carts = session('cart');
            //insert delivery
            $delivery =
            [
                'delivery_email' => $data['email'],
                'delivery_phone' => $data['phone'],
                'delivery_address' => $data['address'],
                'delivery_note' => $data['note'],
            ];
            //insert order
            if ($customer) {
                $delivery = $customer->deliveries()->create($delivery);
            } else {
                $delivery = Delivery::create($delivery);
            }
            if($delivery) {
                $order =
                [
                    'order_code' => date("Ymd").$delivery->id,
                    'order_status' => 0,
                    'order_total' => $data['total'],
                    'payment_type' => $data['paymentMethod'],
                    'created_at' => date('YmdHis'),
                ];
                $delivery = Delivery::orderBy('id', 'DESC')->first();
            }
            if($delivery->order()->create($order)) {
                //insert order-detail
                foreach ($carts as $id => $cart) {
                $order_detail =
                [
                    'order_id' => $delivery->order->id,
                    'product_name' => $cart['name'],
                    'product_price' => $cart['price'],
                    'product_quantity' => $cart['quantity'],
                ];
                $delivery->order->orderDetails()->create($order_detail);

                //cap nhat so luong da ban

                $product_sale_old = Product::find($id)->value('product_sale');
                $product_sale_new = $product_sale_old + $cart['quantity'];
                Product::find($id)->update(
                    [
                        'product_sale' => $product_sale_new,
                    ]
                );
                $cart_array[] = array(
                    'product_name' => $cart['name'],
                    'product_price' => $cart['price'],
                    'product_quantity' => $cart['quantity'],
                );
                }

            }

            // gửi mail
            $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
            $orderIdFormat = date('dmY') . $delivery->order->id;
            $title_mail = "Đơn hàng xác nhận ngày " . $now;
            $shipping_array = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'note' => $data['note'],
                'payment_type' => $data['paymentMethod'],
                'order_id' => $orderIdFormat,
            );


            Mail::send(
                'mail.mail-order',
                [
                    'carts' => $cart_array,
                    'shipping' => $shipping_array,
                ],
                function ($message) use ($title_mail, $data) {
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'], $title_mail);
                }
            );
            Session::flash('success', 'Đơn hàng của bạn đã được lưu');
            session()->forget('cart');
            return view('vnpay.vnpay_return', compact('vnp_data'));
        } else {
            Session::flash('error', 'Đã xảy ra lỗi không thể thanh toán đơn hàng');
            return redirect('/');
        }
    }
}
