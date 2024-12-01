<?php

namespace App\Http\Controllers\Admin;

use App\Charts\AdminChart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::where('order_status', 1)->get();

        // Fetch the total order amount grouped by day of the current month
        $totals = Order::where('order_status', 1)
            ->select(DB::raw("SUM(order_total) as sum"))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->groupBy(DB::raw("Day(created_at)"))
            ->pluck('sum');

        // Fetch the corresponding days
        $days = Order::where('order_status', 1)
            ->select(DB::raw("Day(created_at) as day"))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->groupBy(DB::raw("Day(created_at)"))
            ->pluck('day');

        // Prepare an array for daily totals (assuming max 31 days in a month)
        $data = array_fill(0, 31, 0);

        foreach ($days as $index => $day) {
            // Adjust for zero-based indexing
            $data[$day - 1] = $totals[$index];
        }
        return view('backend.index', compact('orders', 'data'));
    }

    public function monthly()
    {
        $orders = Order::where('order_status', 1)->get();
        $totals = Order::where('order_status', 1)
            ->select(DB::raw("SUM(order_total) as sum"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('sum');
        $months = Order::where('order_status', 1)
            ->select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($months as $index => $month) {
            --$month;
            $data[$month] = $totals[$index];
        }

        return view('backend.monthly', compact('orders', 'data'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }
}
