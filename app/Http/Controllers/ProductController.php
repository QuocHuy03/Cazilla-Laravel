<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Product_orders;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function showCart()
    {
        // Cart::destroy();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.cart', compact('category'));
    }
    public function addCart(Request $request, $id)
    {
        $products = Products::where('id', $id)->first();
        // return $products;
        Cart::add([
            'id' => $products->id,
            'name' => $products->nameProducts,
            'price' => $products->priceProducts,
            'options' => ['thumbnail' => $products->imgProducts],
            'qty' => 1
        ]);
        return redirect()->route('listCart')->with('message', 'Thêm Sản Phẩm Thành Công');
    }
    public function updateCart(Request $request)
    {
        // dd($request->all());
        $data = $request->get('qty');
        foreach ($data as $key => $huydev) {
            Cart::update($key, $huydev);
        }
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Update Quantity Thành Công',
        // ]);
        return redirect()->route('listCart')->with('message', 'Update Quantity Thành Công');
    }
    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('listCart')->with('message', 'Xóa Sản Phẩm Thành Công');
    }

    // order // 
    public function addOrder(Request $request)
    {
        if (Cart::count() > 0) {
            $random_order = Str::random(8);
            Orders::create([
                'user_order' => Auth::user()->id,
                'random_order' => $random_order,
                'status_order' => 'Processed',
            ]);
            $huyne = Orders::orderBy('id', 'DESC')->first();
            $content = Cart::content();
            foreach ($content as $huydev) {
                $data['orders_id'] =  $huyne->id;
                $data['orders_random'] =  $huyne->random_order;
                $data['product_id'] = $huydev->id;
                $data['product_name'] = $huydev->name;
                $data['product_img'] = $huydev->options->thumbnail;
                $data['product_qty'] = $huydev->qty;
                $data['product_price'] = $huydev->subtotal;
                DB::table('products_order')->insert($data);
            }
            // return response()->json([
            //     'status' => true,
            //     'message' => 'Order Thành Công',
            // ]);
            return redirect()->route('showOrder')->with('message', 'Order Thành Công');
            Cart::destroy();
        } else {
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Không Có Sản Phẩm Trong Giỏ Hàng',
            // ]);
            return redirect()->back()->with('error', 'Không Có Sản Phẩm Trong Giỏ Hàng');
        }
    }
}
