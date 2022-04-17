<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index () {
        return view('backend.order.order');
    }

    public function processed () {
        return view('backend.order.processed');
    }

    public function detail () {
        return view('backend.order.detailorder');
    }

    public function postDetail () {

    }
}
