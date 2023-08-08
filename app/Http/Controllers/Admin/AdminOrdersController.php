<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Product_orders;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    public function listOrders()
    {
        $title = 'Đơn Hàng';
        $orders = Orders::all();
        return view('admin.pages.listOrders', compact('title', 'orders'));
    }
    public function detailOrders($slug)
    {
        $title = 'Chi Tiết Đơn Hàng';
        $orderDetails = Product_orders::where('orders_random', '=',  $slug)->get();
        return view('admin.pages.detailOrders', compact('orderDetails', 'title'));
    }
    public function statusDelivering(Request $request, $id)
    {
        $huydev = Orders::where('id', $id)->update(['status_order' => 'Delivering', 'updated_at' => Carbon::now()]);
        if ($huydev) {
            return redirect()->route('admin.pages.orders')->with('message', 'Giao Đơn Hàng Thành Công');
        } else {
            return redirect()->route('admin.pages.orders')->with('error', 'Giao Đơn Hàng Thất Bại');
        }
    }
}
