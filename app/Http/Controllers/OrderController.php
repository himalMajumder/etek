<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Support\Str;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\OrderProgress;
use App\Models\ShippingInfo;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
// Import the Str class

class OrderController extends Controller
{



    public function saveOrder(Request $request)
    {

    //   return $request->all();

        DB::beginTransaction();
        try {
            // Step 1: Validate the Request
            $validatedData = $request->validate([
                'cod'              => 'sometimes|string',
                'home_delivery'    => 'sometimes|string',
                'coupon_code'      => 'nullable|string',
                'points'           => 'nullable|numeric',
                'subtotal'         => 'required|numeric',
                'discount'         => 'sometimes|numeric',
                'tax'              => 'sometimes|numeric',
                'total'            => 'required|numeric',
                'terms_conditions' => 'sometimes|accepted',
            ]);

            // Step 2: Process and Prepare the Data




            // $data = [
            //     'payment_method'   => $validatedData['cod'] ?? null,
            //     'delivery_method'  => $validatedData['home_delivery'] ?? null,
            //     'coupon_code'      => $validatedData['coupon_code'] ?? null,
            //     'discount'         => $validatedData['discount'] ?? 0,
            //     'tax'              => $validatedData['tax'] ?? 0,
            //     'total'            => $validatedData['total'],
            //     'complete_order'   => 1,
            //     'slug'             => Str::random(5) . time(),
            //     'created_at'       => Carbon::now(),
            //     'order_no'         => time() . rand(100, 999),
            //     'user_id'          => auth()->user()->id ?? null,
            //     'order_date'       => now(),
            //     'estimated_dd'     => now()->addDays(7),
            //     'payment_method'   => 1,
            //     'payment_status'   => 0,
            //     'trx_id'           => time() . Str::random(5),
            //     'order_status'     => 0,
            // ];

            $data = [
                'order_no'         => time() . rand(100, 999),
                'user_id'          => auth()->user()->id ?? null,
                'order_date'       => now(),
                'estimated_dd'     => now()->addDays(7),
                'delivery_method'  => $validatedData['home_delivery'] ?? null,
                'payment_method'   => $validatedData['cod'] ?? 1,  // Modified payment method
                'payment_status'   => 0,
                'trx_id'           => time() . Str::random(5),
                'order_status'     => 0,
                'coupon_code'      => $validatedData['coupon_code'] ?? null,
                'discount'         => $validatedData['discount'] ?? 0,
                'tax'              => $validatedData['tax'] ?? 0,
                'total'            => $validatedData['total'],
                'complete_order'   => 1,
                'slug'             => Str::random(5) . time(),
                'created_at'       => Carbon::now(),

                'sub_total'        => $request->subtotal,
                // 'delivery_fee'     => $deliveryCost,
                'delivery_fee'     => 100,
                'vat'              => 0,
                'order_note'       => $request->special_note,
            ];

            // Step 3: Save the Data (Assuming you have an Order model)
            $orderInfo = Order::create($data);

            // Step 4: Process Order Progress
            $orderProcess = [
                'order_id'     => $orderInfo->id,
                'order_status' => 0,
                'created_at'   => Carbon::now(),
            ];
            OrderProgress::create($orderProcess);

            // Step 5: Process Cart Items
            foreach (session('cart') as $id => $details) {
                $productInfo = Product::with('productVariant')->where('id', $id)->firstOrFail();
                DB::table('products')->where('id', $id)->update([
                    'stock' => $productInfo->stock - $details['quantity'],
                ]);

                $discount_price = $details['discount_price'] ?? 0;
                $orderDetails = [
                    'order_id'            => $orderInfo->id,
                    'product_id'          => $id,
                    'color_id'            => $details['color_id'] ?? null,
                    'size_id'             => $details['size_id'] ?? null,
                    'qty'                 => $details['quantity'],
                    'unit_id'             => $productInfo->unit_id,
                    'unit_price'          => $discount_price > 0 ? $discount_price : $details['price'],
                    'total_price'         => ($discount_price > 0 ? $discount_price : $details['price']) * $details['quantity'],
                    'created_at'          => Carbon::now(),
                ];

                OrderDetails::create($orderDetails);
            }

            // Step 6: Save Order Payment Information
            DB::table('order_payments')->insert([
                'order_id'        => $orderInfo->id,
                'payment_through' => "COD",
                'tran_id'         => $orderInfo->trx_id,
                'val_id'          => null,
                'amount'          => $orderInfo->total,
                'card_type'       => null,
                'store_amount'    => $orderInfo->total,
                'card_no'         => null,
                'status'          => "VALID",
                'tran_date'       => now(),
                'currency'        => "BDT",
                'created_at'      => Carbon::now(),
            ]);

            // Step 7: Save Shipping Address
            $shipping_address = UserAddress::where('slug', $request->shipping_address_id)->first();
            $user =  User::where('id', $shipping_address->user_id)->first();

            //   dd($shipping_address);
            if ($request->shipping_address_id != 'null' && $shipping_address) {
                DB::table('shipping_infos')->insert([
                    'order_id'   => $orderInfo->id,
                    'full_name'  => $shipping_address->name,
                    'phone'      => $shipping_address->phone,
                    'email'      => $user->email,
                    'address'    => $shipping_address->address,
                    'post_code'  => $shipping_address->post_code,
                    'thana'      => $shipping_address->thana ?? 'null',
                    'city'       => $shipping_address->city,
                    'country'    => $shipping_address->country,
                    'created_at' => Carbon::now(),
                ]);
            } else {
                DB::table('shipping_infos')->insert([
                    'order_id'   => $orderInfo->id,
                    'full_name'  => $request->shipping_name,
                    'phone'      => $request->shipping_phone,
                    'email'      => $request->shipping_email,
                    'address'    => $request->shipping_address,
                    'post_code'  => $request->shipping_post_code,
                    'thana'      => $request->name ?? 'null',
                    'city'       => $request->shipping_city,
                    'country'    => $request->shipping_country,
                    'created_at' => Carbon::now(),
                ]);
            }

            // Step 8: Save Billing Address
            $billing_addresses = UserAddress::where('slug', $request->billing_address_id)->first();
            if ($request->billing_address_id != 'null' && $billing_addresses) {
                DB::table('billing_addresses')->insert([
                    'order_id'   => $orderInfo->id,
                    'address'    => $billing_addresses->address,
                    'post_code'  => $billing_addresses->post_code,
                    'thana'      => $billing_addresses->thana ?? 'null',
                    'city'       => $billing_addresses->city,
                    'country'    => $billing_addresses->country,
                    'created_at' => Carbon::now(),
                ]);
            } else {
                DB::table('billing_addresses')->insert([
                    'order_id'   => $orderInfo->id,
                    'address'    => $request->billing_address,
                    'post_code'  => $request->billing_postal_code,
                    'thana'      => $request->name ?? 'null',
                    'city'       => $request->billing_city,
                    'country'    => $request->billing_country,
                    'created_at' => Carbon::now(),
                ]);

                // Step 9: Subscribe User if Email Provided
                if ($request->billing_email) {
                    DB::table('subscribed_users')->insert([
                        'email'      => $request->billing_email,
                        'created_at' => Carbon::now(),
                    ]);
                }
            }

            // Commit the transaction
            DB::commit();


            session()->forget(['coupon', 'discount', 'delivery_cost', 'cart']);

            return redirect()->route('orderPreview', ['slug' => $orderInfo->slug])->with('message', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order placement failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an issue placing your order. Please try again.');
        }
    }


    // public function saveOrder(Request $request)
    // {




    //     // return $request->all();




    //     // Step 1: Validate the Request
    //     $validatedData = $request->validate([
    //         'cod'              => 'sometimes|string',
    //         'home_delivery'    => 'sometimes|string',
    //         'coupon_code'     => 'nullable|string',
    //         'points'           => 'nullable|numeric',
    //         'subtotal'         => 'required|numeric',
    //         'discount'         => 'sometimes|numeric',
    //         'tax'              => 'sometimes|numeric',
    //         'total'            => 'required|numeric',
    //         'terms_conditions' => 'sometimes|accepted',
    //     ]);

    //     // Step 2: Process and Prepare the Data
    //     $data = [
    //         'payment_method' => $validatedData['cod'], // Adjust based on your actual field names
    //         'delivery_method' => $validatedData['home_delivery'] ?? null,
    //         'coupon_code'    => $validatedData['coupon_code'] ?? null,

    //         // 'points' => $validatedData['points'] ?? 0,
    //         // 'subtotal' => $validatedData['subtotal'],
    //         'discount'       => $validatedData['discount'],
    //         'tax'            => $validatedData['tax'],
    //         'total'          => $validatedData['total'],

    //         // 'terms_accepted' => $validatedData['terms_conditions'] === '1',
    //         // 'delivery_cost' => 420.00, // Example fixed delivery cost
    //         'complete_order' => 1,
    //         'slug'           => str::random(5) . time(),
    //         'created_at'     => Carbon::now(),
    //         'order_no'       => time() . rand(100, 999),
    //         'user_id'        => auth()->user()->id ?? null,
    //         'order_date'     => date("Y-m-d H:i:s"),
    //         'estimated_dd'   => date('Y-m-d', strtotime("+7 day", strtotime(date("Y-m-d")))),
    //         'payment_method' => 1,
    //         'payment_status' => 0,
    //         'trx_id'         => time() . str::random(5),
    //         'order_status'   => 0,
    //     ];

    //     // Step 3: Save the Data (Assuming you have an Order model)
    //     $orderInfo = Order::create($data);


    //     $orderProcess = [
    //         'order_id'     => $orderInfo->id,
    //         'order_status' => 0,
    //         'created_at'   => Carbon::now(),

    //     ];
    //     OrderProgress::create($orderProcess);

    //     foreach (session('cart') as $id => $details) {

    //         // decrement the stock
    //         $productInfo = Product::with('productVariant')->where('id', $id)->first();


    //         DB::table('products')->where('id', $id)->update([
    //             'stock' => $productInfo->stock - $details['quantity'],
    //         ]);

    //         $discount_price = $details['discount_price'] ?? 0;

    //         $orderDetails = [
    //             'order_id'            => $orderInfo->id,
    //             'product_id'          => $id,

    //             // VARIANT
    //             'color_id'            => $details['color_id'] ?? null,
    //             'region_id'           => null,
    //             'sim_id'              => null,
    //             'size_id'             => $details['size_id'] ?? null,
    //             'storage_id'          => null,
    //             'warrenty_id'         => null,
    //             'device_condition_id' => null,

    //             'qty'                 => $details['quantity'],
    //             'unit_id'             => $productInfo->unit_id,
    //             'unit_price'          => $discount_price > 0 ? $discount_price : $details['price'],
    //             'total_price'         => ($discount_price > 0 ? $discount_price : $details['price']) * $details['quantity'],
    //             'created_at'          => Carbon::now(),
    //         ];


    //         $orderDetails = OrderDetails::create($orderDetails);
    //     }

    //     // Step 4: Redirect or Respond

    //     session()->forget('coupon');
    //     session()->forget('discount');
    //     session()->forget('delivery_cost');
    //     session()->forget('cart');






    //     $orderInfo = DB::table('orders')->where('id', $orderInfo->id,)->first();
    //     DB::table('order_payments')->insert([
    //         'order_id' => $orderInfo->id,
    //         'payment_through' => "COD",
    //         'tran_id' => $orderInfo->trx_id,
    //         'val_id' => NULL,
    //         'amount' => $orderInfo->total,
    //         'card_type' => NULL,
    //         'store_amount' => $orderInfo->total,
    //         'card_no' => NULL,
    //         'status' => "VALID",
    //         'tran_date' => date("Y-m-d H:i:s"),
    //         'currency' => "BDT",
    //         'card_issuer' => NULL,
    //         'card_brand' => NULL,
    //         'card_sub_brand' => NULL,
    //         'card_issuer_country' => NULL,
    //         'created_at' => Carbon::now()
    //     ]);



    //     $shipping_address = UserAddress::where('slug', $request->shipping_address_id)->first();


    //     if ($request->shipping_address_id != 'null' && $shipping_address) {
    //         DB::table('shipping_infos')->insert([
    //             'order_id' => $orderInfo->id,
    //             'address' => $shipping_address->address,
    //             'post_code' => $shipping_address->post_code,
    //             'thana' => $shipping_address->thana ?? 'null', // Adjusted to handle missing `thana`
    //             'city' => $shipping_address->city,
    //             'country' => $shipping_address->country,
    //             'created_at' => Carbon::now(),
    //         ]);
    //     } else {
    //         DB::table('shipping_infos')->insert([
    //             'order_id' => $orderInfo->id,
    //             'address' => $request->shipping_address,
    //             'post_code' => $request->shipping_post_code,
    //             'thana' => $request->name ?? 'null',
    //             'city' => $request->shipping_city,
    //             'country' => $request->shipping_country,
    //             'created_at' => Carbon::now(),
    //         ]);
    //     }


    //     $billing_addresses = UserAddress::where('slug', $request->billing_address_id)->first();

    //     if ($request->billing_address_id != 'null' && $billing_addresses) {
    //         DB::table('billing_addresses')->insert([
    //             'order_id' => $orderInfo->id,
    //             'address' => $billing_addresses->address,
    //             'post_code' => $billing_addresses->post_code,
    //             'thana' => $billing_addresses->thana ?? 'null', // Adjusted to handle missing `thana`
    //             'city' => $billing_addresses->city,
    //             'country' => $billing_addresses->country,
    //             'created_at' => Carbon::now(),
    //         ]);
    //     } else {
    //         DB::table('billing_addresses')->insert([
    //             'order_id' => $orderInfo->id,
    //             'address' => $request->billing_address,
    //             'post_code' => $request->billing_postal_code,
    //             'thana' => $request->name ?? 'null',
    //             'city' => $request->billing_city,
    //             'country' => $request->billing_country,
    //             'created_at' => Carbon::now(),
    //         ]);

    //         if ($request->email) {
    //             DB::table('subscribed_users')->insert([
    //                 'email' => $request->email ?? 'null',
    //                 'created_at' => Carbon::now(),
    //             ]);
    //         }
    //     }










    //     return redirect()->route('orderPreview', ['slug' => $orderInfo->slug])->with('message', 'Order placed successfully!');
    // }



    public function orderPreview($slug)
    {
        $orderInfo = Order::select('order_no')->where('slug', $slug)->first();


        if ($orderInfo) {
            return view('frontend.pages.order_preview', compact('orderInfo'));
        } else {
            return redirect('/');
        }
    }


    public function orderDetails($slug)
    {
        $order = Order::with('user', 'order_details.product.category',  'order_details.unit', 'order_payments', 'order_progress', 'shipping_infos', 'billingAddress')->where('slug', $slug)->first();

    //    dd($order);

        $generalInfo = DB::table('general_infos')->select('logo', 'logo_dark', 'company_name')->first();

        if (!$order) {
            abort(404);
        }
        return view('frontend.pages.order_details', compact('order', 'generalInfo'));
    }
}
