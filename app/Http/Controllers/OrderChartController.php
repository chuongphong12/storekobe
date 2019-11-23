<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\OrderChart;
use App\Charts\CustomerChart;
use App\Customer;
use App\Order;
use Auth;

class OrderChartController extends Controller
{
    public function index()
    {
        $today_orders = Order::whereDate('created_at', today())->count();
        $yesterday_orders = Order::whereDate('created_at', today()->subDays(1))->count();
        $order_2_days_ago = Order::whereDate('created_at', today()->subDays(2))->count();

        $order = new OrderChart;
        $order->labels(['2 days ago', 'Yesterday', 'Today']);
        $order->dataset('Order', 'bar', [$order_2_days_ago, $yesterday_orders, $today_orders]);

        $today_customers = Customer::whereDate('created_at', today())->count();
        $yesterday_customers = Customer::whereDate('created_at', today()->subDays(1))->count();
        $customers_2_days_ago = Customer::whereDate('created_at', today()->subDays(2))->count();

        $cus = new CustomerChart;
        $cus->labels(['2 days ago', 'Yesterday', 'Today']);
        $cus->dataset('Customer', 'line', [$customers_2_days_ago, $yesterday_customers, $today_customers]);

        if (Auth::user()->role_id != 1) {
            return redirect()->back();
        } else {
            return view('chart.report', compact('cus', 'order'));
        }
    }
}
