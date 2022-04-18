<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;




class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $product = Product::find($product_id);
        $cart = session()->get('cart');
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] = $cart[$product_id]['quantity'] + 1;
        } else {
            $cart[$product_id] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => $quantity,
                'image' => $product->image->image1,
            ];
        }
        session()->put('cart', $cart);
        return response()->json(
            [
                'code' => 200,
                'message' => 'Sản phẩm đã được thêm vào giỏ hàng',
                'status' => 200,
            ]
        );
    }

    public function loadCart()
    {
        if(session('cart'))
        {
            echo json_encode(array('totalcart' => count(session('cart')))); die;
            return;
        }
        else
        {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart)); die;
            return;
        }
    }

    public function index()
    {
        $cart = session('cart');
        return view('frontend.cart', compact('cart'));
    }

    public function updateCart(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        if(session('cart'))
        {
            $cart = session('cart');
                foreach($cart as $keys => $values)
                {
                    if($keys == $product_id)
                    {
                        $cart[$keys]["quantity"] =  $quantity;
                        session()->put('cart', $cart);
                        $cart = session('cart');
                        $cart_component = view(
                            'frontend.component.cart-component',
                            compact('cart')
                        )->render();
                        return response()->json(
                            [
                                'cart_component' => $cart_component,
                                'status' => "cap nhat thanh cong",
                            ],
                        );
                    }
                }

        }
    }

    public function deleteFromCart(Request $request)
    {
        $product_id = $request->product_id;
        if ($product_id) {
            $cart = session('cart');
            unset($cart[$product_id]);
            session()->put('cart', $cart);
            return redirect('/cart');
        }
    }

    public function clearAll()
    {
        session()->forget('cart');
        return redirect('/cart');
    }

    public function buyNow(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $product = Product::find($product_id);
        $cart = session()->get('cart');
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] = $cart[$product_id]['quantity'] + 1;
        } else {
            $cart[$product_id] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => $quantity,
                'image' => $product->image->image1,
            ];
        }
        session()->put('cart', $cart);
        return response()->json(
            [
                'code' => 200,
                'message' => 'Sản phẩm đã được thêm vào giỏ hàng',
                'status' => 200,
            ]
        );
    }
}

