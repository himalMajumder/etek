<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\District;
use App\Models\Upazila;
use App\Models\UserAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommonController extends Controller
{

    /**
     * Return all Districts
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function districts(Request $request): JsonResponse
    {
        $districts = District::get();

        return response()->json([
            'data' => $districts,
        ]);
    }

    /**
     * Return all Upazilas
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function upazilas(Request $request): JsonResponse
    {
        $upazilas = Upazila::where(function ($query) use ($request) {

            if ($request->input('district_id')) {
                $query->where('district_id', $request->input('district_id'));
            }

        })->get();

        return response()->json([
            'data' => $upazilas,
        ]);
    }

    /**
     * Store Address
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function storeAddress(UserAddressRequest $request): JsonResponse
    {
        $attributes = $request->validated();

        $district = District::where('id', $attributes['district_id'])->first();
        $upazila  = Upazila::where('id', $attributes['upazila_id'])->first();

        $userAddressData = [
            'user_id'   => auth()->user()->id ?? 0,
            'name'      => $attributes['name'],
            'address'   => $attributes['address'],
            'country'   => 'Bangladesh',
            'city'      => $district->name,
            'state'     => $upazila->name,
            'post_code' => null,
            'phone'     => $attributes['phone'],
        ];
        $shippingAddress = [];
        $billingAddress  = [];

        if (isset($attributes['shipping_address'])) {
            $userAddressData['address_type'] = 'Home';
            $userAddressData['slug']         = Str::random(5) . time();
            $shippingAddress                 = UserAddress::create($userAddressData);
        }

        if (isset($attributes['billing_address'])) {
            $userAddressData['address_type'] = 'Office';
            $userAddressData['slug']         = Str::random(5) . time();
            $billingAddress                  = UserAddress::create($userAddressData);
        }

        return response()->json([
            'data' => [
                'shipping_address' => $shippingAddress,
                'billing_address'  => $billingAddress,
            ],
        ]);
    }

    /**
     * Destroy User Address
     *
     * @param Request $request
     * @param string $slug
     * @return JsonResponse
     */
    public function destroyAddress(Request $request, string $slug): JsonResponse
    {
        $deleteCheck = UserAddress::where('slug', $slug)->delete();

        return response()->json([
            'data' => $deleteCheck,
        ]);
    }

    /**
     * Get User Address
     *
     * @param Request $request
     * @param string $slug
     * @return JsonResponse
     */
    public function getAddress(Request $request, string $slug): JsonResponse
    {
        $userAddress = UserAddress::where('slug', $slug)->first();

        return response()->json([
            'data' => $userAddress,
        ]);
    }

}
