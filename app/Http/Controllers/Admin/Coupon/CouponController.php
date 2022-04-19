<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::paginate(10);
        return view('backend.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $coupon =
        [
            'code' => $request->code,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
        ];
        if (Coupon::create($coupon)) {
            return redirect()->route('coupon.index')
            ->with('success', 'Thêm mã giảm giá thành công');
        } else {
            return redirect()->route('coupon.index')
            ->with('error', 'Đã xảy ra lỗi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('backend.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::find($id);
        $couponUpdate =
        [
            'code' => $request->code,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
        ];
        if ($coupon->update($couponUpdate)) {
            return redirect()->route('coupon.index')
            ->with('success', 'cập nhật mã giảm giá thành công');
        } else {
            return redirect()->route('coupon.index')
            ->with('error', 'Đã xảy ra lỗi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Coupon::find($id)->delete()) {
            return redirect()->route('coupon.index')
            ->with('success', 'xóa mã giảm giá thành công');
        } else {
            return redirect()->route('coupon.index')
            ->with('error', 'Đã xảy ra lỗi');
        }
    }
}
