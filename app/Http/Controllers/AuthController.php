<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Credits;
use App\Models\Orders;
use App\Models\Product_orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{

    public function login()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('auth.login', compact('category'));
    }
    public function register()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('auth.register', compact('category'));
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('auth.login');
    }

    public function DoLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Nhập tên đăng nhập của bạn',
            'password.required' => 'Nhập mật khẩu của bạn',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        } else {
            $user = User::where('username', $request->username)->first();

            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                if ($user->banned >= 1) {
                    return redirect()->back()->with('error', 'Tài khoản của bạn đang bị khóa');
                } elseif (!$user) {
                    return redirect()->back()->with('error', 'Tên đăng nhập không tồn tại');
                } else {
                    // dd($request->all());

                    Auth::login($user);
                    return redirect()->route('/')->with('message', 'Đăng nhập thành công');
                }
            } else {
                return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
            }
        }
    }

    public function DoRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|min:6|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'number' => 'required|string|min:10|max:10|unique:users',
            'password_confirmation' => 'required|string|min:6|same:password',

        ], [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'number.required' => 'Vui lòng nhập số điện thoại',
            'number.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu',
            'password_confirmation.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        } else {
            $jwt = Str::random(60);
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'level' => 'member',
                'banned' => '0',
                'ip' => $request->ip(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            if ($user) {
                return redirect()->route('auth.login')->with('message', 'Đăng ký thành công');
                // return response()->json(['status' => 'success', 'message' => 'Đăng ký thành công']);
            } else {
                return redirect()->back()->with('error', 'Đăng ký thất bại')->withInput();
            }
        }
    }

    // profile
    public function showProfile()
    {
        $order_profile = Orders::where('user_order', '=', Auth::user()->id)->count();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.profile-info', compact('order_profile', 'category'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
            'number' => 'required|string|',
            'address' => 'required|string|',
            'pass_new' => 'required|string|min:6',
            'comfrim_pass' => 'required|string|same:pass_new',
        ], [
            'name.required' => 'Mật khẩu cũ không được để trống',
            'number.required' => 'Mật khẩu cũ không được để trống',
            'address.required' => 'Mật khẩu cũ không được để trống',
            'pass_new.required' => 'Mật khẩu mới không được để trống',
            'comfrim_pass.required' => 'Xác nhận mật khẩu không được để trống',
            'pass_new.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'comfrim_pass.same' => 'Xác nhận mật khẩu không đúng',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        } else {
            $user = Auth::user();
            if ($user) {
                User::where('id', $user->id)->update([
                    'name' => $request->name,
                    'number' => $request->number,
                    'address' => $request->address,
                    'password' => Hash::make($request->pass_new),
                    'updated_at' => Carbon::now()
                ]);
                // User::where('id', $user->id)->update(['password' => Hash::make($request->pass_new), 'updated_at' => Carbon::now()]);
                // return response()->json([
                //     'status' => true,
                //     'message' => 'Update profile thành công',
                // ]);
                return redirect()->back()->with('message', 'Update Thành Công');
              
            } else {
                // return response()->json([
                //     'status' => false,
                //     'message' => 'Update profile thất bại',
                // ]);
                return redirect()->back()->with('error', 'Update Thất Bại');
            }
        }
    }

    // profile order 

    public function showProfileOrder()
    {
        $show_orders = Orders::where('user_order', '=', Auth::user()->id)->paginate(5);
        $order_profile = Orders::where('user_order', '=', Auth::user()->id)->count();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.profile-orders', compact('show_orders', 'order_profile', 'category'));
    }

    // profile address

    public function showProfileAddress()
    {
        $order_profile = Orders::where('user_order', '=', Auth::user()->id)->count();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.profile-address', compact('order_profile', 'category'));
    }

    // profile payment 
    public function showProfilePayment()
    {
        $show_payment = Credits::where('user_id', '=', Auth::user()->id)->get();
        $order_profile = Orders::where('user_order', '=', Auth::user()->id)->count();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.profile-payment', compact('show_payment', 'order_profile', 'category'));
    }
}
