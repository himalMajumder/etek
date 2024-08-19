<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Brian2694\Toastr\Toastr;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class ProductReviewController extends Controller
{

    public function productReview()
    {

        $productReviews = DB::table('product_reviews')
            ->join('products', 'product_reviews.product_id', 'products.id')
            ->select('products.name', 'products.image', 'product_reviews.rating', 'product_reviews.review', 'product_reviews.id', 'product_reviews.status')
            ->where('product_reviews.user_id', Auth::user()->id)
            ->orderBy('product_reviews.id', 'desc')
            ->paginate(5);

        return view('frontend.user.product_review', compact('productReviews'));
    }



    public function deleteProductReview($id)
    {
        DB::table('product_reviews')->where('id', $id)->where('user_id', Auth::user()->id)->delete();
        Toastr::success('Review is Deleted');
        return back();
    }

    public function updateProductReview(Request $request)
    {

        // dd($request);
        DB::table('product_reviews')->where('id', $request->product_review_id)->where('user_id', Auth::user()->id)->update([
            'rating' => $request->review_rating,
            'review' => $request->review_text,
            'status' => 0
        ]);
        Toastr::success('Successfully Updated the Review');
        return back();
    }
}
