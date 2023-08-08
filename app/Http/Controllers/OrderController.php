<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Credits;
use App\Models\Orders;
use App\Models\Product_orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{

    public function showReviews($slug)
    {
        $products_orders = Product_orders::where('orders_random', '=',  $slug)->get();
        $credits = Credits::where('user_id', '=', Auth::user()->id)->first();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.order', compact('products_orders', 'credits', 'category'));
    }
    public function showOrder()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.checkout', compact('category'));
    }
    public function showOrders()
    {
        $order_huydev = Orders::where('user_order', '=', Auth::user()->id)->get();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.shipping', compact('order_huydev', 'category'));
    }

    public function showComplete()
    {
        $complete = Orders::where('user_order', '=', Auth::user()->id)->first();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.complete', compact('complete', 'category'));
    }

    // check đơn hàng của khách hàng 
    public function statusComplete(Request $request, $id)
    {
        $complete = Orders::where('id', $id)->update(['status_order' => 'Complete', 'updated_at' => Carbon::now()]);
        if ($complete) {
            return redirect()->route('showOrders')->with('message', 'Cảm Ơn Bạn Đã Đến Với Shop');
        } else {
            return redirect()->route('showOrders')->with('error', 'Error');
        }
    }
}
