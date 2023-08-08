<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $products = Products::with('category')->orderBy('id', 'DESC')->paginate(20);
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.home', compact('products', 'category'));
    }
    public function detail($slug)
    {
        $products_detail  =  Products::where('slug', $slug)->first();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.detail', compact('products_detail', 'category'));
    }
    public function getListProducts(Request $request, $slug, $id)
    {

        $category = Category::orderBy('id', 'DESC')->get();
        $count_products = Products::all()->count();
        $url = $request->segment(2);
        $url = preg_split("/(-)/i", $url);
        // dd(array_pop($url));u
        if ($id = array_pop($url)) {
            // dd($id);
            // theo danh mục
            $products = Products::where('product_cat_id', '=', $id);
            //  lọc theo giá 
            if ($request->price) {
                $price = $request->price;
                switch ($price) {
                    case '1':
                        $products->where('priceProducts', '<', 1000000); // dưới 1m
                        break;
                    case '2':
                        $products->whereBetween('priceProducts', [1000000, 3000000]); // trên 1m dưới 3m
                        break;
                    case '3':
                        $products->whereBetween('priceProducts', [3000000, 5000000]); // trên 3m dưới 5m
                        break;
                    case '4':
                        $products->whereBetween('priceProducts', [5000000, 7000000]); // trên 5m dưới 7m
                        break;
                    case '5':
                        $products->whereBetween('priceProducts', [7000000, 10000000]); // trên 7m dưới 10m
                        break;
                    case '6':
                        $products->where('priceProducts', '>', '10000000'); // lớn hơn 10m
                        break;
                }
            }
            // lọc sorting //

            if ($request->orderby) {
                $orderby = $request->orderby;
                // dd($orderby);
                switch ($orderby) {
                    case 'desc':
                        $products->orderBy('id', 'DESC');
                        break;
                    case 'asc':
                        $products->orderBy('id', 'ASC');
                        break;
                    case 'price_max':
                        $products->orderBy('id', 'ASC');
                        break;
                    case 'price_min':
                        $products->orderBy('id', 'DESC');
                        break;
                    default:
                        $products->orderBy('id', 'DESC');
                }
            }

            // show
            $products = $products->paginate(6);
            $cateProducts = Category::find($id);
            $viewData = [
                'count_products' => $count_products,
                'category' => $category,
                'products' => $products,
                'cateProducts' => $cateProducts,
            ];

            return view('pages.products', $viewData);
        }
        return redirect('/');
    }

}
