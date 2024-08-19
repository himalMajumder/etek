<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Job;
use App\Models\Brand;
use App\Models\Color;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Category;
use App\Models\ConfigSetup;
use App\Models\GeneralInfo;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\ProductQuestionAnswer;

class FrontendController extends Controller
{



    public function quickView($id)
    {
        $product    = Product::findOrFail($id);
        $images     = json_decode($product->multiple_images, true);

        return response()->json([
            'html' => view('frontend.include.quick-view', compact('product', 'images'))->render()
        ]);
    }


    public function index()
    {
        $sliders = DB::table('banners')->where('type', 1)->where('status', 1)->orderBy('serial', 'asc')->get();
        $bannerstops = DB::table('banners')->where('type', 2)->where('position', 'top')->where('status', 1)->orderBy('serial', 'asc')->take('2')->get();
        $featuredCategories = DB::table('categories')->where('featured', 1)->orderBy('serial', 'asc')->take(12)->get();
        $bannerInfo = DB::table('banners')->where('type', 2)->take(3)->get();
        $bannerInfoTwos = DB::table('banners')->where('type', 2)->orderBy('id', 'DESC')->take(2)->get();
        $bannermiddle = DB::table('banners')->where('type', 2)->where('position', 'middle')->where('status', 1)->orderBy('serial', 'asc')->first();
        $categories = DB::table('categories')->where('status', 1)->orderBy('serial', 'asc')->get();
        $flags = DB::table('flags')->where('status', 1)->orderBy('id', 'desc')->get();
        $brands = DB::table('brands')->where('status', 1)->orderBy('serial', 'asc')->get();
        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('flags', 'products.flag_id', 'flags.id')
            ->select('products.image', 'products.name', 'price', 'discount_price', 'products.id', 'products.slug', 'stock', 'has_variant', 'flags.name as flag_name', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->where('products.status', 1);

        $products = $query->take(10)->get();
        $Category = Category::with('subcategories.childCategories')->get();
        $generalInfo = GeneralInfo::first();
        $lan = session()->get('language');
        return view('frontend.pages.index', compact('lan', 'generalInfo', 'bannermiddle', 'products', 'sliders', 'featuredCategories', 'bannerInfo', 'bannerInfoTwos', 'bannerstops'));
    }

    public function about()
    {
        $testimonials = DB::table('testimonials')->orderBy('created_at', 'DESC')->get();
        $brands = DB::table('brands')->where('status', 1)->orderBy('created_at', 'DESC')->get();
        $about = AboutUs::first();
        return view('frontend.pages.about', compact('about', 'brands', 'testimonials'));
    }



    public function contact()
    {
        $lan = session()->get('language');
        $generalInfo = GeneralInfo::first();
        return view('frontend.pages.contact', compact('generalInfo', 'lan'));
    }




    public function portfolio()
    {
        return view('frontend.pages.portfolio');
    }

    public function privacyPolicy()
    {
        $privacyPolicy = DB::table('terms_and_policies')->orderBy('created_at', 'DESC')->select('privacy_policy')->first();
        return view('frontend.pages.privacyPolicy', compact('privacyPolicy'));
    }

    public function faq()
    {
        $faqs = Faq::all();
        return view('frontend.pages.faq', compact('faqs'));
    }



    public function compare()
    {
        $products = Product::all()->take(9);
        //    dd($product);

        return view('frontend.pages.compare', compact('products'));
    }


    // public function searchProducts(Request $request)
    // {
    //     $query = $request->input('query');
    //     $products = Product::where('name', 'like', "%$query%")->limit(10)->get();

    //     return response()->json($products);
    // }





    public function compareProducts()
    {

        return view('frontend.pages.compare');
    }

    public function searchProducts(Request $request)
    {
        $query = $request->input('search');

        $products = Product::where('name', 'like', '%' . $query . '%')->get();

        // Log to Laravel's log to debug
        Log::info('Search query: ' . $query);
        \Log::info('Products found: ' . $products->count());

        return response()->json($products);
    }
    // public function getProductDetails(Request $request)
    // {
    //     $productId = $request->input('id');
    //     // $product = Product::find($productId);
    //     // dd($product);
    //     $product = Product::with('brand','color')->find($productId);
    //     // dd( $product);

    //     if ($product) {
    //         return response()->json($product);
    //     } else {
    //         return response()->json(['message' => 'Product not found'], 404);
    //     }
    // }



    public function termsCondition()
    {
        $termsCondition = DB::table('terms_and_policies')->orderBy('created_at', 'DESC')->select('terms')->first();
        return view('frontend.pages.termsCondition', compact('termsCondition'));
    }

    public function refundPolicy()
    {
        $refundPolicy = DB::table('terms_and_policies')->orderBy('created_at', 'DESC')->select('return_policy')->first();
        return view('frontend.pages.refundPolicy', compact('refundPolicy'));
    }

    public function career()
    {
        $jobs = Job::all();
        return view('frontend.pages.career', compact('jobs'));
    }

    public function notFound()
    {
        return view('frontend.pages.notFound');
    }

    public function blog()
    {
        $blogs = DB::table('blogs')->where('status', 1)->orderBy('created_at', 'DESC')->paginate(9);
        return view('frontend.pages.blog', compact('blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = DB::table('blogs')->where('status', 1)->where('slug', $slug)->orderBy('created_at', 'DESC')->first();
        $relatedArticles = DB::table('blogs')->where('status', 1)->where('category_id', $blog->category_id)->take(2)->get();
        $blogs = DB::table('blogs')->where('status', 1)->orderBy('created_at', 'DESC')->take(3)->get();
        $brands = DB::table('brands')->where('status', 1)->orderBy('created_at', 'DESC')->get();
        $generalInfo = GeneralInfo::first();
        return view('frontend.pages.blogDetails', compact('generalInfo', 'brands', 'blog', 'relatedArticles', 'blogs'));
    }

    public function brand()
    {
        $brands = DB::table('brands')->where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('frontend.pages.brand', compact('brands'));
    }

    public function shop()
    {
        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('flags', 'products.flag_id', 'flags.id')
            ->select('products.image', 'products.name', 'price', 'discount_price', 'products.id', 'products.slug', 'stock', 'has_variant', 'flags.name as flag_name', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->where('products.status', 1);

        $products = $query->get();
        return view('frontend.pages.shop', compact('products'));
    }

    public function shopCategory($slug)
    {
        $category = DB::table('categories')->where('slug', $slug)->orderBy('serial', 'asc')->first();

        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('flags', 'products.flag_id', '=', 'flags.id')
            ->select('products.image', 'products.name',  'products.category_id', 'price', 'discount_price', 'products.id', 'products.slug', 'stock', 'has_variant', 'flags.name as flag_name', 'categories.name as category_name', 'categories.name_bn as category_name_bn', 'subcategories.name as subcategory_name')
            ->where('products.status', 1)
            ->where('products.category_id', $category->id);

        $products = $query->get();
        // dd( $products);
        $lan = session()->get('language');
        return view('frontend.pages.shop', compact('products', 'lan'));
    }


    public function shopSubcategory($slug)
    {
        $subcategory = DB::table('subcategories')->where('slug', $slug)->orderBy('serial', 'asc')->first();
        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('flags', 'products.flag_id', '=', 'flags.id')
            ->select('products.image', 'products.name', 'products.category_id', 'price', 'discount_price', 'products.id', 'products.slug', 'stock', 'has_variant', 'flags.name as flag_name', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->where('products.status', 1)
            ->where('products.subcategory_id', $subcategory->id);

        $products = $query->get();
        return view('frontend.pages.shop', compact('products'));
    }

    public function childCategory($slug)
    {
        $child_categorie = DB::table('child_categories')->where('slug', $slug)->first();
        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('flags', 'products.flag_id', '=', 'flags.id')
            ->select('products.image', 'products.name', 'products.category_id', 'price', 'discount_price', 'products.id', 'products.slug', 'stock', 'has_variant', 'flags.name as flag_name', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->where('products.status', 1)
            ->where('products.childcategory_id', $child_categorie->id);
        $products = $query->get();
        return view('frontend.pages.shop', compact('products'));
    }


    public function productDetails($slug)
    {
        $product = DB::table('products')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', 'brands.id')
            ->leftJoin('product_models', 'products.model_id', 'product_models.id')
            ->select('products.*', 'categories.name as category_name', 'categories.slug as category_slug', 'brands.name as brand_name', 'product_models.name as model_name')
            ->where('products.slug', $slug)
            ->first();

        $mayLikedProducts = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('flags', 'products.flag_id', 'flags.id')
            ->select('products.image', 'products.name', 'price', 'discount_price', 'products.id', 'products.slug', 'stock', 'has_variant', 'flags.name as flag_name', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->where('products.id', '!=', $product->id)
            ->inRandomOrder()
            ->skip(0)
            ->limit(12)

            ->get();
        $productReviews = DB::table('product_reviews')
            ->leftJoin('users', 'product_reviews.user_id', 'users.id')
            ->select('product_reviews.rating', 'product_reviews.review', 'product_reviews.reply', 'product_reviews.created_at', 'product_reviews.status', 'users.name as username', 'users.image as user_image')
            ->where('product_reviews.product_id', $product->id)
            ->where('product_reviews.status', 1)
            ->orderBy('product_reviews.id', 'desc')
            ->paginate(10);

        $totalReviews = $productReviews->total();
        $totalRating = DB::table('product_reviews')->where('product_reviews.product_id', $product->id)->where('product_reviews.status', 1)->sum('rating');
        $averageRating = $totalReviews > 0 ? $totalRating / $totalReviews : 0;

        $productMultipleImages = DB::table('product_images')->select('image')->where('product_id', $product->id)->get();

        $variants = DB::table('product_variants')
            ->leftJoin('colors', 'product_variants.color_id', 'colors.id')
            ->leftJoin('product_sizes', 'product_variants.size_id', 'product_sizes.id')
            ->select('product_variants.*', 'colors.id as color_id', 'colors.name as color_name', 'colors.code as color_code', 'product_sizes.name as size_name')
            ->where('product_variants.product_id', $product->id)
            ->get();

        $configSetup = DB::table('config_setups')->get();
        $generalInfo = GeneralInfo::first();
        $productQuestionAnswers =  ProductQuestionAnswer::where('product_id', $product->id)->get();
        return view('frontend.pages.product_details', compact('productQuestionAnswers', 'mayLikedProducts', 'product', 'averageRating', 'totalReviews', 'productReviews', 'productMultipleImages', 'variants', 'configSetup'));
    }



    public function test()
    {
        return view('frontend.pages.test');
    }

    public function subscribeForNewsletter(Request $request)
    {
        $data = DB::table('subscribed_users')->where('email', trim($request->email))->first();
        if ($data) {
            $notification = array(
                'message' => 'Successfully Done',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            DB::table('subscribed_users')->insert([
                'email' => $request->email,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Successfully Done',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
            Toastr::success('Successfully Subscribed', 'Success');
            return back();
        }
    }


    // public function filterProduct(Request $request)
    // {
    //     $minPrice = $request->input('min_price', 0);
    //     $maxPrice = $request->input('max_price', 580900);
    //     $categories = $request->input('categories', []);
    //     $brands = $request->input('brands', []);
    //     $colors = $request->input('colors', []);
    //     $sizes = $request->input('productSize', []);

    //     $query = DB::table('products')
    //         ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
    //         ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
    //         ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
    //         ->leftJoin('colors', 'product_variants.color_id', '=', 'colors.id')
    //         ->leftJoin('product_sizes', 'product_variants.size_id', '=', 'product_sizes.id')
    //         ->leftJoin('flags', 'products.flag_id', '=', 'flags.id')
    //         ->select(
    //             'products.image',
    //             'products.name',
    //             'products.category_id',
    //             'products.price',
    //             'products.discount_price',
    //             'products.id',
    //             'products.slug',
    //             'products.stock',
    //             'products.has_variant',
    //             'brands.name as brand_name',
    //             'categories.name as category_name',
    //             'colors.name as color_name',
    //             'product_sizes.name as size_name',
    //             'flags.name as flag_name'
    //         )
    //         ->distinct()
    //         ->where('products.status', 1);

    //     if (!empty($categories)) {
    //         $query->whereIn('products.category_id', $categories);
    //     }

    //     if (!empty($brands)) {
    //         $query->whereIn('products.brand_id', $brands);
    //     }

    //     $query->where(function ($q) use ($minPrice, $maxPrice) {
    //         $q->whereBetween('products.discount_price', [$minPrice, $maxPrice])
    //             ->orWhere(function ($q) use ($minPrice, $maxPrice) {
    //                 $q->whereNull('products.discount_price')
    //                     ->whereBetween('products.price', [$minPrice, $maxPrice]);
    //             });
    //     });

    //     if (!empty($colors)) {
    //         $query->whereIn('colors.id', $colors);
    //     }

    //     if (!empty($sizes)) {
    //         $query->whereIn('product_sizes.id', $sizes);
    //     }
    //     $products = $query->get();
    //     return view('frontend.pages.shop', compact('products'));
    // }



    public function filterProduct(Request $request)
    {
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 580900);
        $categories = $request->input('categories', []);
        $brands = $request->input('brands', []);
        $colors = $request->input('colors', []);
        $sizes = $request->input('productSize', []);

        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->leftJoin('colors', 'product_variants.color_id', '=', 'colors.id')
            ->leftJoin('product_sizes', 'product_variants.size_id', '=', 'product_sizes.id')
            ->leftJoin('flags', 'products.flag_id', '=', 'flags.id')
            ->select(
                'products.image',
                'products.name',
                'products.category_id',
                'products.price',
                'products.discount_price',
                'products.id',
                'products.slug',
                'products.stock',
                'products.has_variant',
                'brands.name as brand_name',
                'categories.name as category_name',
                'colors.name as color_name',
                'product_sizes.name as size_name',
                'flags.name as flag_name'
            )
            ->distinct()
            ->where('products.status', 1);

        if (!empty($categories)) {
            $query->whereIn('products.category_id', $categories);
        }

        if (!empty($brands)) {
            $query->whereIn('products.brand_id', $brands);
        }

        $query->where(function ($q) use ($minPrice, $maxPrice) {
            $q->whereBetween('products.discount_price', [$minPrice, $maxPrice])
                ->orWhere(function ($q) use ($minPrice, $maxPrice) {
                    $q->whereNull('products.discount_price')
                        ->whereBetween('products.price', [$minPrice, $maxPrice]);
                });
        });

        if (!empty($colors)) {
            $query->whereIn('colors.id', $colors);
        }

        if (!empty($sizes)) {
            $query->whereIn('product_sizes.id', $sizes);
        }

        $products = $query->get();

        if ($request->ajax()) {
            return view('frontend.include.filtered-products', compact('products'))->render();
        }

        return view('frontend.pages.shop', compact('products'));
    }





















    public function shortProduct(Request $request)
    {
        // Base query for products
        $productsQuery = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->leftJoin('colors', 'product_variants.color_id', '=', 'colors.id')
            ->leftJoin('product_sizes', 'product_variants.size_id', '=', 'product_sizes.id')
            ->leftJoin('flags', 'products.flag_id', '=', 'flags.id')
            ->select(
                'products.image',
                'products.name',
                'products.category_id',
                'products.price',
                'products.discount_price',
                'products.id',
                'products.slug',
                'products.stock',
                'products.has_variant',
                'brands.name as brand_name',
                'categories.name as category_name',
                'colors.name as color_name',
                'product_sizes.name as size_name',
                'flags.name as flag_name'
            )
            ->where('products.status', 1);

        // Apply sorting based on the request
        if ($request->product_short == 'latest') {
            // Get distinct product IDs sorted by created_at
            $distinctProductIds = DB::table('products')
                ->select('id')
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->pluck('id');

            // Filter products by distinct IDs
            $productsQuery->whereIn('products.id', $distinctProductIds)
                ->groupBy(
                    'products.id',
                    'products.image',
                    'products.name',
                    'products.category_id',
                    'products.price',
                    'products.discount_price',
                    'products.slug',
                    'products.stock',
                    'products.has_variant',
                    'brands.name',
                    'categories.name',
                    'colors.name',
                    'product_sizes.name',
                    'flags.name'
                )
                ->orderBy('products.created_at', 'desc'); // Ensure proper sorting
        } elseif ($request->product_short == 'popularity') {
            $productsQuery->orderBy('popularity', 'desc'); // Assuming 'popularity' is a column in the 'products' table
        } elseif ($request->product_short == 'newness') {
            $productsQuery->orderBy('products.created_at', 'asc'); // Sorting by earliest created
        } elseif ($request->product_short == 'rating') {
            // Join product_reviews and calculate average rating
            $productsQuery->leftJoin('product_reviews', 'products.id', '=', 'product_reviews.product_id')
                ->selectRaw('products.*, AVG(product_reviews.rating) as average_rating')
                ->groupBy(
                    'products.id',
                    'products.image',
                    'products.name',
                    'products.category_id',
                    'products.price',
                    'products.discount_price',
                    'products.slug',
                    'products.stock',
                    'products.has_variant',
                    'brands.name',
                    'categories.name',
                    'colors.name',
                    'product_sizes.name',
                    'flags.name'
                )
                ->orderBy('average_rating', 'desc'); // Sort by average rating
        } else {
            // Handle invalid sort criteria
            return response()->json(['message' => 'No products found.'], 404);
        }

        // Get the results
        $products = $productsQuery->get();

        // Check if request is AJAX and return partial view
        if ($request->ajax()) {
            return view('frontend.include.filtered-products', compact('products'))->render();
        }

        // Return the full view
        return view('frontend.pages.shop', compact('products'));
    }


    public function search(Request $request)
    {
        // Get the search query from the request
        $searchTerm = $request->input('query');

        // Build the query
        $query = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
            ->leftJoin('flags', 'products.flag_id', '=', 'flags.id')
            ->select(
                'products.image',
                'products.name',
                'price',
                'discount_price',
                'products.id',
                'products.slug',
                'stock',
                'has_variant',
                'flags.name as flag_name',
                'categories.name as category_name',
                'subcategories.name as subcategory_name'
            )
            ->where('products.status', 1);

        // Add search filter if a search term is provided
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('products.name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('products.description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('categories.name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('subcategories.name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('flags.name', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Get the results
        $products = $query->get();

        // Return the view with the products
        return view('frontend.pages.shop', compact('products'));
    }
}
