<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PageController extends Controller
{
    public function index()
    {
        $title = "Trang Quản Trị";
        $products = Products::all()->count();
        $orders = Orders::all()->count();
        $users = User::where('level', '!=', 'admin')->count();
        $users_today = User::where('level', '!=', 'admin')->where('created_at', '>=', Carbon::now()->startOfDay())->count();
        return view('admin.index', compact('title', 'products', 'orders', 'users', 'users_today'));
    }
    //  ================================= add , edit , delete products ================================= //
    public function viewProducts()
    {
        $title = "Thêm Sản Phẩm";
        $products = Products::all();
        // dd($products);
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.pages.products', compact('title', 'products', 'category'));
    }

    public function addProducts(Request $request)
    {
        // dd($request->input());
        $validator = Validator::make($request->all(), [
            'imgProducts' => 'required',
            'nameProducts' => 'required|string',
            'slug' => 'required',
            'priceProducts' => 'required',
            'descProducts' => 'required|string',
            'product_cat_id' => 'required',
        ], [
            'imgProducts.required' => 'Nội dung không được để trống',
            'nameProducts.required' => 'Nội dung không được để trống',
            'nameProducts.string' => 'Nội dung phải là chuỗi',
            'slug.required' => 'Nội dung không được để trống',
            'priceProducts.required' => 'Nội dung không được để trống',
            'descProducts.required' => 'Nội dung không được để trống',
            'descProducts.string' => 'Nội dung phải là chuỗi',
            'product_cat_id.required' => 'Nội dung không được để trống',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            Products::create([
                'product_cat_id' => $request->product_cat_id,
                'imgProducts' => $request->imgProducts,
                'nameProducts' => $request->nameProducts,
                'slug' => $request->slug,
                'priceProducts' => $request->priceProducts,
                'descProducts' => $request->descProducts,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Thêm thành công',
            ]);
        }
    }
    public function deleteProducts(Request $request)
    {
        $products = Products::find($request->id);
        if ($products) {
            $products->delete();
            return redirect()->back()->with('message', 'Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy thông báo');
        }
    }

    public function editProducts(Request $request)
    {
        $title = "Chỉnh Sửa Sản Phẩm";
        $products = Products::where('id', $request->id)->first();
        $category = Category::orderBy('id', 'DESC')->get();
        if (empty($products)) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
        }
        return view('admin.pages.editProducts', compact('title', 'products', 'category'));
    }
    public function DoEditProducts(Request $request)
    {
        // dd($request->input());
        $validator = Validator::make($request->all(), [
            'imgProducts' => 'required',
            'nameProducts' => 'required|string',
            'slug' => 'required',
            'priceProducts' => 'required',
            'descProducts' => 'required|string',
            'product_cat_id' => 'required',
        ], [
            'imgProducts.required' => 'Nội dung không được để trống',
            'nameProducts.required' => 'Nội dung không được để trống',
            'nameProducts.string' => 'Nội dung phải là chuỗi',
            'slug.required' => 'Nội dung không được để trống',
            'priceProducts.required' => 'Nội dung không được để trống',
            'descProducts.required' => 'Nội dung không được để trống',
            'descProducts.string' => 'Nội dung phải là chuỗi',
            'product_cat_id.required' => 'Nội dung không được để trống',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            $products = Products::where([
                'id' => $request->id
            ])->first();
            if (!$products) {
                return response()->json([
                    'status' => false,
                    'message' => 'Sản phẩm không tồn tại',
                ]);
            } else {
                Products::where('id', $request->id)->update([
                    // 'user_id' => Auth::user()->id,
                    'product_cat_id' => $request->product_cat_id,
                    'imgProducts' => $request->imgProducts,
                    'nameProducts' => $request->nameProducts,
                    'slug' => $request->slug,
                    'priceProducts' => $request->priceProducts,
                    'descProducts' => $request->descProducts,
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Chỉnh Sửa Thành Công',
                ]);
            }
        }
    }
    //  ================================= add , edit , delete category ================================= //

    public function viewCategory()
    {
        $title = "Thêm Sản Phẩm";
        $category = Category::all();
        return view('admin.pages.category', compact('title', 'category'));
    }

    public function addCategory(Request $request)
    {
        // dd($request->input());
        $validator = Validator::make($request->all(), [
            'nameCategory' => 'required|string',
            'slug' => 'required|string',
        ], [
            'nameCategory.required' => 'Nội dung không được để trống',
            'nameCategory.string' => 'Nội dung phải là chuỗi',
            'slug.required' => 'Nội dung không được để trống',
            'slug.string' => 'Nội dung không được để trống',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            Category::create([
                'nameCategory' => $request->nameCategory,
                'slug' => $request->slug
            ]);
            // return response()->json([
            //     'status' => true,
            //     'message' => 'Thêm thành công',
            // ]);
            return redirect()->back()->with('message', 'Thêm thành công');
        }
    }

    public function editCategory(Request $request)
    {
        $title = "Chỉnh Sửa danh mục";
        $category = Category::where('id', $request->id)->first();
        if (empty($category)) {
            return redirect()->back()->with('error', 'Không tìm thấy danh mục');
        }
        return view('admin.pages.editCategory', compact('title', 'category'));
    }
    public function DoEditCategory(Request $request)
    {
        // dd($request->input());
        $validator = Validator::make($request->all(), [
            'nameCategory' => 'required|string',
            'slug' => 'required|string',
        ], [
            'nameCategory.required' => 'Nội dung không được để trống',
            'nameCategory.string' => 'Nội dung phải là chuỗi',
            'slug.required' => 'Nội dung không được để trống',
            'slug.string' => 'Nội dung không được để trống',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            $category = Category::where([
                'id' => $request->id
            ])->first();
            if (!$category) {
                // return response()->json([
                //     'status' => false,
                //     'message' => 'Danh mục không tồn tại',
                // ]);
                return redirect()->back()->with('error', 'Danh mục không tồn tại');
            } else {
                Category::where('id', $request->id)->update([
                    'nameCategory' => $request->nameCategory,
                    'slug' => $request->slug
                ]);
                // return response()->json([
                //     'status' => true,
                //     'message' => 'Chỉnh Sửa Thành Công',
                // ]);
                return redirect()->back()->with('message', 'Chỉnh Sửa Thành Công');
            }
        }
    }
    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with('message', 'Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy thông báo');
        }
    }

    //  =================================  edit , delete User ================================= //

    public function viewUsers()
    {
        $title = "List Users";
        $users = User::all();
        return view('admin.pages.users', compact('title', 'users'));
    }
    public function editUsers(Request $request)
    {
        $title = "Chỉnh Sửa Users";
        $users = User::where('id', $request->id)->first();
        if (empty($users)) {
            return redirect()->back()->with('error', 'Không tìm thấy thành viên');
        }
        return view('admin.pages.editUsers', compact('title', 'users'));
    }
    public function DoEditUsers(Request $request)
    {
        // dd($request->input());
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'email' => 'required|string',
            'number' => 'required',
            'level' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            $users = User::where([
                'id' => $request->id
            ])->first();
            if (!$users) {
                // return response()->json([
                //     'status' => false,
                //     'message' => 'Thành viên không tồn tại',
                // ]);
                return redirect()->back()->with('error', 'Thành viên không tồn tại');
            } else {
                User::where('id', $request->id)->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'number' => $request->number,
                    'level' => $request->level
                ]);
                // return response()->json([
                //     'status' => true,
                //     'message' => 'Chỉnh Sửa Thành Công',
                // ]);
                return redirect()->back()->with('message', 'Chỉnh Sửa Thành Công');
            }
        }
    }
    public function deleteUsers(Request $request)
    {
        $users = User::find($request->id);
        if ($users) {
            $users->delete();
            return redirect()->back()->with('message', 'Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy thông báo');
        }
    }
}
