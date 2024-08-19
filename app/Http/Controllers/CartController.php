<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserAddress;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name'     => $product->name,
                'quantity' => 1,
                'price'    => $product->discount_price > 0 ? $product->discount_price : $product->price,
                'image'    => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => 'Product added to cart', 'cart' => $cart]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'action'     => 'required|string|in:increase,decrease,remove',
        ]);

        $cart      = session()->get('cart', []);
        $productId = $request->product_id;

        if ($request->action == 'increase') {

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            }

        } elseif ($request->action == 'decrease') {

            if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
            }

        } elseif ($request->action == 'remove') {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);

        return response()->json(['cart' => $cart]);
    }

    public function checkout()
    {

        $carts       = session()->get('cart', []);
        $userAddress = [];

        if (Auth::check()) {
            $userId      = Auth::user()->id;
            $userAddress = UserAddress::where('user_id', $userId)->get();
        }

        return view('frontend.pages.checkout', compact('carts', 'userAddress'));
    }

    public function getCartItems()
    {
        // Retrieve cart items from the session
        $carts = session()->get('cart', []);

        // Return the rendered view with cart items

        return view('frontend.include.cart_items', compact('carts'))->render();
    }

    public function appendItems(Request $request)
    {
        // Fetch new cart items data; for example, this could be based on session data or database.
        $newItems = $this->getNewItems();

       // This is a placeholder for your logic

        // Return the rendered view with new items

        return view('frontend.include.cart_items', compact('newItems'))->render();
    }

    private function getNewItems()
    {
        // Example method to fetch new items; replace with your logic
        return [
            ['id' => 101, 'name' => 'New Product 1', 'color' => 'Red', 'size' => 'M', 'quantity' => 1, 'price' => 100],
            // Add more items as necessary
        ];
    }

    public function addWishlist(Request $request)
    {

        if (Auth::check()) {
            $userId    = Auth::user()->id;
            $productId = $request->input('product_id');

            $existingWishlistItem = Wishlist::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existingWishlistItem) {
                return response()->json(['status' => 'error', 'message' => 'You have already added this product to your wishlist.']);
            }

            $data = [
                'user_id'    => $userId,
                'product_id' => $productId,
                'slug'       => $request->input('product_slug'),
                'created_at' => Carbon::now(),
            ];

            Wishlist::insert($data);

            return response()->json(['status' => 'success', 'message' => 'Product added to wishlist']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Please log in to add products to your wishlist'], 401);
        }

    }

    public function applyCoupon(Request $request)
    {

        $couponCode = $request->coupon_code;
        $couponInfo = DB::table('promo_codes')->where('code', $couponCode)->first();

        if ($couponInfo && auth()->check()) {

            if (DB::table('orders')->where('coupon_code', $couponInfo->code)->where('user_id', Auth::user()->id)->exists()) {
                session([
                    'coupon'   => $couponCode,
                    'discount' => 0,
                ]);
                $checkoutTotalAmount = view('frontend.pages.order_total')->render();

                return response()->json(['message' => 'Coupon Already Used', 'status' => 0, 'checkoutTotalAmount' => $checkoutTotalAmount]);
            }

            if ($couponInfo->expire_date < date("Y-m-d")) {
                session([
                    'coupon'   => $couponCode,
                    'discount' => 0,
                ]);
                $checkoutTotalAmount = view('frontend.pages.order_total')->render();

                return response()->json(['message' => 'Coupon is Expired', 'status' => 0, 'checkoutTotalAmount' => $checkoutTotalAmount]);
            }

            $subTotal = 0;

            foreach ((array) session('cart') as $id => $details) {
                $subTotal += ($details['discount_price'] > 0 ? $details['discount_price'] : $details['price']) * $details['quantity'];
            }

            if ($couponInfo->minimum_order_amount && $couponInfo->minimum_order_amount > $subTotal) {
                session([
                    'coupon'   => $couponCode,
                    'discount' => 0,
                ]);
                $checkoutTotalAmount = view('frontend.pages.order_total')->render();

                return response()->json(['message' => 'Sorry! Minimum Order Amount is ' . $couponInfo->minimum_order_amount, 'status' => 0, 'checkoutTotalAmount' => $checkoutTotalAmount]);
            }

            $discount = 0;

            if ($couponInfo->type == 1) {
                $discount = $couponInfo->value;
            } else {
                $discount = ($subTotal * $couponInfo->value) / 100;
            }

            session([
                'coupon'   => $couponCode,
                'discount' => $discount,
            ]);

            $checkoutTotalAmount = view('frontend.pages.order_total')->render();

            return response()->json(['message' => 'Coupon Applied Successfully', 'status' => 1, 'checkoutTotalAmount' => $checkoutTotalAmount]);

        } else {
            session([
                'coupon'   => $couponCode,
                'discount' => 0,
            ]);
            $checkoutTotalAmount = view('frontend.pages.order_total')->render();

            return response()->json(['message' => 'Sorry No Coupon Found', 'status' => 0, 'checkoutTotalAmount' => $checkoutTotalAmount]);
        }

    }

}
