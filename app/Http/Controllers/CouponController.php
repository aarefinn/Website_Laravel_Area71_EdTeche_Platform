<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function couponStore(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|string|max:255',
        ]);

        $coupon = Coupon::where('code', $request->code)->where('status', 'active')->first();

        if ($coupon) {
            session()->put('coupon', [
                'id' => $coupon->id,
                'code' => $coupon->code,
                'value' => $coupon->value,
                'type' => $coupon->type,
            ]);
            request()->session()->flash('success', 'Coupon applied successfully!');
        } else {
            request()->session()->flash('error', 'Invalid coupon code!');
        }

        return redirect()->back();
    }
} 