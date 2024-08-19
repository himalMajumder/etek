<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Upazila;
use App\Models\User;
use App\Models\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserHomeController extends Controller
{

    public function dashboard()
    {
        $userId            = Auth::user()->id;
        $totalOrderPlaced  = DB::table('orders')->where('user_id', $userId)->count();
        $totalRunningOrder = DB::table('orders')->where('user_id', $userId)->where('order_status', '<', 3)->count();
        $itemsInWishList   = DB::table('wish_lists')->where('user_id', $userId)->count();

        $totalAmountSpent   = DB::table('orders')->where('user_id', $userId)->sum('total');
        $totalOpenedTickets = DB::table('support_tickets')->where('support_taken_by', $userId)->where('status', '<', 2)->count();
        $orders             = Order::with('order_details.product', 'order_payments', 'order_progress', 'shipping_infos')->take(10)->get();

        $itemsInWishListData = DB::table('wish_lists')->where('user_id', $userId)->get();

        $wishLists = WishList::with('product')->get();
        // dd($wishLists);

        return view('frontend.user.dashboard', compact('wishLists', 'orders', 'totalOrderPlaced', 'totalRunningOrder', 'itemsInWishList', 'totalAmountSpent', 'totalOpenedTickets'));
    }

    public function userOrder()
    {
        $orders = Order::with('order_details.product', 'order_payments', 'order_progress', 'shipping_infos')->paginate(3);

        return view('frontend.user.user_order', compact('orders'));
    }

    public function orderTracking()
    {
        return view('frontend.user.order_tracking');
    }

    public function orderCancelation()
    {
        return view('frontend.user.user_order');
    }

    public function returnProduct()
    {
        return view('frontend.user.return_product');
    }

    public function wishlist()
    {
        $wishLists = WishList::with('product')->get();

        return view('frontend.user.wishlist', compact('wishLists'));
    }

    public function destroy($id)
    {
        $wishlistItem = WishList::findOrFail($id);
        $wishlistItem->delete();

        return response()->json(['success' => true]);
    }

    public function promoCoupon()
    {
        $promoCoupons = DB::table('promo_codes')->orderBy('status', 'desc')->get();
        // dd($promoCoupons);
        $appliedCoupons = DB::table('orders')
            ->join('promo_codes', 'orders.coupon_code', 'promo_codes.code')
            ->select('promo_codes.*')
            ->where('orders.user_id', Auth::user()->id)
        // ->groupBy('promo_codes.code')
            ->get();
        // dd($appliedCoupons);

        return view('frontend.user.promo_coupon', compact('promoCoupons', 'appliedCoupons'));
    }

    public function createAddressNew()
    {
        // dd('Apu Sardar');
        $districts = District::all();
        $upazilas  = Upazila::all();

        return view('frontend.user.create_address', compact('districts', 'upazilas'));
    }

    public function getAreas($city_id)
    {
        $areas = Upazila::where('district_id', $city_id)->get();

        return response()->json($areas);
    }

    // Display user addresses, districts, and upazilas
    public function address()
    {
        $districts = District::all();
        $upazilas  = Upazila::all();
        $addresses = DB::table('user_addresses')->where('user_id', Auth::user()->id)->get();

        return view('frontend.user.address', compact('addresses', 'districts', 'upazilas'));
    }

    // Save a new user address
    public function saveUserAddress(Request $request)
    {

        // dd($request);
        $existingAddress = DB::table('user_addresses')
            ->where('user_id', Auth::user()->id)
            ->where('address_type', $request->address_type)
            ->first();

        if ($existingAddress) {
            //  Toastr::error($request->address_type . ' Address already Exists', 'Delete the Previous One');
            return back();
        }

        $districtInfo = District::find($request->shipping_district_id);
        $upazilaInfo  = Upazila::find($request->shipping_thana_id);

        DB::table('user_addresses')->insert([
            'user_id'      => Auth::user()->id,
            'address_type' => $request->address_type,
            'name'         => Auth::user()->name,
            'address'      => $request->adress_line,
            'country'      => 'Bangladesh',
            'city'         => $districtInfo ? $districtInfo->name : '',
            'state'        => $upazilaInfo ? $upazilaInfo->name : '',
            'post_code'    => $request->postal_code,
            'phone'        => Auth::user()->phone,
            'slug'         => Str::random(5) . time(),
            'created_at'   => Carbon::now(),
        ]);

        //  Toastr::success('New Address Added', 'Saved Successfully');

        return back();
    }

    // Get upazilas by district ID
    public function districtWiseThana(Request $request)
    {
        $districtInfo               = District::find($request->district_id);
        $districtWiseDeliveryCharge = $districtInfo ? $districtInfo->delivery_charge : 0;

        session(['delivery_cost' => $districtWiseDeliveryCharge]);

        $upazilas = Upazila::where("district_id", $request->district_id)
            ->orderBy('name', 'asc')
            ->get(['name', 'id']);

        $checkoutTotalAmount = view('checkout.order_total')->render();

        return response()->json([
            'data'                => $upazilas,
            'checkoutTotalAmount' => $checkoutTotalAmount,
        ]);
    }

    // Update an existing user address
    public function updateUserAddress(Request $request)
    {
        $districtInfo = District::find($request->edit_district_id);
        $upazilaInfo  = Upazila::find($request->edit_shipping_thana_id);

        DB::table('user_addresses')->where('slug', $request->address_slug)->update([
            'name'       => Auth::user()->name,
            'address'    => $request->edit_address_line,
            'city'       => $districtInfo ? $districtInfo->name : '',
            'state'      => $upazilaInfo ? $upazilaInfo->name : '',
            'post_code'  => $request->edit_postal_Code,
            'phone'      => Auth::user()->phone,
            'updated_at' => Carbon::now(),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

    // Remove a user address
    public function removeUserAddress($slug)
    {
        DB::table('user_addresses')->where('slug', $slug)->delete();

        return back();
    }

    // Get areas by city ID
    public function getAreasByCity(Request $request)
    {
        $cityId = $request->input('city_id');
        $areas  = Upazila::where('district_id', $cityId)->get();

        return response()->json(['areas' => $areas]);
    }

    public function payment()
    {
        $userId            = Auth::user()->id;
        $currentMonthSpent = DB::table('orders')->where('user_id', $userId)->where('created_at', 'like', date("Y-m") . '%')->sum('total');
        $lastSixMonthSpent = DB::table('orders')->where('user_id', $userId)->where('created_at', '>=', date("Y-m-d", strtotime("-6 month")) . " 23:59:59")->sum('total');
        $totalSpent        = DB::table('orders')->where('user_id', $userId)->sum('total');
        $orders            = DB::table('orders')->where('user_id', $userId)->orderBy('id', 'desc')->paginate(10);

        return view('frontend.user.payment', compact('currentMonthSpent', 'lastSixMonthSpent', 'totalSpent', 'orders'));
    }

    public function rewards()
    {
        $faqs = Faq::all();
        $user = Auth::user(); // Get the authenticated user

        return view('frontend.user.rewards', compact('faqs', 'user'));
    }

    public function manageProfile()
    {
        return view('frontend.user.manage_profile');
    }

}
