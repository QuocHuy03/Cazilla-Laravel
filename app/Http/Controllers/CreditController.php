<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Credits;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreditController extends Controller
{
    public function showPayment()
    {
        $credits = Credits::where('user_id', '=', Auth::user()->id)->first();
        $category = Category::orderBy('id', 'DESC')->get();
        return view('pages.payment', compact('credits', 'category'));
    }

    public function addCredit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required|string',
            'name' => 'required|string',
            'cvc' => 'required|min:3',
            'expiry' => 'required',
        ], [
            'number.required' => 'Số tài khoản không được để trống',
            'name.required' => 'Vui lòng nhập tên tài khoản',
            'cvc.required' => 'Vui lòng nhập cvc sau thẻ',
            'cvc.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'expiry.required' => 'Vui lòng nhập thời hạn thẻ',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        } else {
            $credits = Credits::create([
                'number_card' => $request->number,
                'user_id' => Auth::user()->id,
                'name_card' => $request->name,
                'cvc_card' => $request->cvc,
                'date_card' => $request->expiry,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            if ($credits) {
                // return response()->json([
                //     'status' => true,
                //     'message' => 'Thêm Credits thành công',
                // ]);
                return redirect()->back()->with('message', 'Thêm Thẻ Visa Thành Công');
            } else {
                // return response()->json([
                //     'status' => false,
                //     'message' => 'Thêm Credits thất bại',
                // ]);
                return redirect()->back()->with('error', 'Thêm Thẻ Visa Thất Bại');
            }
        }
    }
}
