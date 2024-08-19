<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
Route::get('/test-env', function () {
    return response()->json([
        'APP_URL'   => env('APP_URL'),
        'ADMIN_URL' => env('ADMIN_URL'),
    ]);
});

Route::get('/test-config', function () {
    return response()->json([
        'APP_URL'   => config('app.url'),
        'ADMIN_URL' => config('admin.url'),
    ]);
});

Route::get('districts', [CommonController::class, 'districts'])->name('districts');
Route::get('upazilas', [CommonController::class, 'upazilas'])->name('upazilas');
Route::post('address/store', [CommonController::class, 'storeAddress'])->name('newAddress.store');
Route::delete('address/{slug}/destroy', [CommonController::class, 'destroyAddress'])->name('newAddress.destroy');
Route::get('address/{slug}', [CommonController::class, 'getAddress'])->name('newAddress.get');

// Routes For language change
Route::post('language/change', [LocalizationController::class, 'changeLanguage'])->name('language.change');

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/faq', [FrontendController::class, 'faq'])->name('frontend.faq');
Route::get('/privacy/policy', [FrontendController::class, 'privacyPolicy'])->name('frontend.privacy.policy');

Route::get('/refund/policy', [FrontendController::class, 'refundPolicy'])->name('frontend.refund.policy');
Route::get('/terms/condition', [FrontendController::class, 'termsCondition'])->name('frontend.terms.condition');

Route::get('/compare', [FrontendController::class, 'compare'])->name('frontend.compare');
Route::post('/compare-products', [FrontendController::class, 'compareProducts'])->name('compare.products');
Route::get('/search-products', [FrontendController::class, 'searchProducts'])->name('search.products');
Route::get('/product-details', [FrontendController::class, 'getProductDetails'])->name('product.details');

Route::get('/product/quick-view/{id}', [FrontendController::class, 'quickView'])->name('product.quick-view');

Route::get('/quick-view/{id}', [FrontendController::class, 'quickViewNew'])->name('quick.view');

Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('frontend.portfolio');

Route::get('/career', [FrontendController::class, 'career'])->name('frontend.career');

// Route::fallback([FrontendController::class, 'notFound'])->name('frontend.notFound');
Route::get('/404', [FrontendController::class, 'notFound'])->name('frontend.notFound');

Route::fallback(function () {
    return view('frontend.pages.notFound');
});

Route::get('/blog', [FrontendController::class, 'blog'])->name('frontend.blog');
Route::get('/blog-details/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.details');

Route::get('/brand', [FrontendController::class, 'brand'])->name('frontend.brand');
Route::get('/shop', [FrontendController::class, 'shop'])->name('frontend.shop');

Route::get('/shop/category/{slug}', [FrontendController::class, 'shopCategory'])->name('shop.category');
Route::get('/shop/{slug}', [FrontendController::class, 'shopSubcategory'])->name('shop.subcategory');

Route::get('/shop/childCategory/{slug}', [FrontendController::class, 'childCategory'])->name('shop.childCategory');

Route::get('/test', [FrontendController::class, 'test'])->name('test');

Route::get('/product/{slug}', [FrontendController::class, 'productDetails'])->name('product.detail');

Route::post('/filter/product', [FrontendController::class, 'filterProduct'])->name('filter.product');

Route::post('/short/product', [FrontendController::class, 'shortProduct'])->name('short.product');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
// Route::get('/show/count', [CartController::class, 'showCart'])->name('show.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/show/cart', [CartController::class, 'showCart'])->name('show.cart');
Route::post('apply/coupon', [CartController::class, 'applyCoupon'])->name('ApplyCoupon');

Route::post('/cart/append-items', [CartController::class, 'appendItems'])->name('cart.appendItems');
Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
Route::post('/wishlist/add', [CartController::class, 'addWishlist'])->name('wishlist.add');

Route::post('/question/save', [HomeController::class, 'quesitonSave'])->name('quesiton.save');
Route::post('/contact/submit', [HomeController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/job-details/{slug}', [HomeController::class, 'jobDetails'])->name('job.details');
Route::get('/job/apply/{id}', [HomeController::class, 'jobApply'])->name('job.apply');

Route::post('job/apply/submit', [HomeController::class, 'jobApplySubmit'])->name('job.apply.submit');

Route::post('/save-order', [OrderController::class, 'saveOrder'])->name('saveOrder');
Route::get('/order-preview/{slug}', [OrderController::class, 'orderPreview'])->name('orderPreview');
Route::get('/order-details/{slug}', [OrderController::class, 'orderDetails'])->name('order.details');

// Route::get('/filter/data', [FrontendController::class, 'filterData'])->name('filter.data');
// Route::post('/submit/contact/request', [FrontendController::class, 'submitContactRequest'])->name('SubmitContactRequest')->middleware(ProtectAgainstSpam::class)->middleware(['throttle:3,1']);
// Route::post('subscribe/for/newsletter', [FrontendController::class, 'subscribeForNewsletter'])->name('SubscribeForNewsletter')->middleware(ProtectAgainstSpam::class)->middleware(['throttle:3,1']);

Route::post('/submit/contact/request', [FrontendController::class, 'submitContactRequest'])->name('SubmitContactRequest');
Route::post('subscribe/for/newsletter', [FrontendController::class, 'subscribeForNewsletter'])->name('SubscribeForNewsletter');

// Route::get('/login', [HomeController::class, 'login'])->name('login');
// Route::get('/register', [HomeController::class, 'registerAccount'])->name('register.account');
// Route::post('/register/save', [HomeController::class, 'registerAccountSave'])->name('register');

Route::get('/search', [FrontendController::class, 'search'])->name('product.search');

Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login/save', [AuthenticationController::class, 'loginData'])->name('login.data');
Route::get('/register', [AuthenticationController::class, 'registerAccount'])->name('register.account');
Route::post('/register/save', [AuthenticationController::class, 'registerAccountSave'])->name('register');
Route::get('/auth/google', [AuthenticationController::class, 'authGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthenticationController::class, 'authGoogleCallback'])->name('auth.google');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [UserHomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/user-order', [UserHomeController::class, 'userOrder'])->name('user.order');
    Route::get('/order-tracking', [UserHomeController::class, 'orderTracking'])->name('order.tracking');

    Route::get('/order-cancelation', [UserHomeController::class, 'orderCancelation'])->name('order.cancelation');
    Route::get('/return-product', [UserHomeController::class, 'returnProduct'])->name('return.product');

    Route::get('/wishlist', [UserHomeController::class, 'wishlist'])->name('wishlist');
    Route::delete('/wishlist/{id}', [UserHomeController::class, 'destroy'])->name('wishlist.destroy');

    Route::get('/promo-coupon', [UserHomeController::class, 'promoCoupon'])->name('promo.coupon');

    Route::get('/create/user/address', [UserHomeController::class, 'createAddressNew'])->name('create.address.new');
    Route::get('/get-areas/{city_id}', [UserHomeController::class, 'getAreas'])->name('get.areas');

    // Routes for managing user addresses
    Route::post('/save/user/address', [UserHomeController::class, 'saveUserAddress'])->name('address.store');
    Route::get('/address', [UserHomeController::class, 'address'])->name('address');
    Route::post('district/wise/thana', [UserHomeController::class, 'districtWiseThana'])->name('DistrictWiseThana');
    Route::post('/update/user/address', [UserHomeController::class, 'updateUserAddress'])->name('address.update');
    Route::get('/remove/user/address/{slug}', [UserHomeController::class, 'removeUserAddress'])->name('address.destroy');
    Route::get('/areas/by-city', [UserHomeController::class, 'getAreasByCity'])->name('areas.by.city');

    Route::get('/payment', [UserHomeController::class, 'payment'])->name('payment'); //ok
    Route::get('/rewards', [UserHomeController::class, 'rewards'])->name('rewards');

    Route::get('/manage-profile', [UserHomeController::class, 'manageProfile'])->name('manage.profile');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::post('/update/password', [AuthenticationController::class, 'updatePassword'])->name('UpdatePassword');

    Route::get('/product-review', [ProductReviewController::class, 'productReview'])->name('product.review');
    Route::get('/delete/product/review/{id}', [ProductReviewController::class, 'deleteProductReview'])->name('delete.product.review');
    Route::post('/update/product/review', [ProductReviewController::class, 'updateProductReview'])->name('update.product.review');

    // SupportTicketController
    Route::get('/support-ticket', [SupportTicketController::class, 'supportTicket'])->name('support.ticket');
    Route::get('/ticket-conversation/{slug}', [SupportTicketController::class, 'ticketConversation'])->name('ticket.conversation');
    Route::get('/create-ticket', [SupportTicketController::class, 'createTicket'])->name('create.ticket');
    Route::post('/save/support/ticket', [SupportTicketController::class, 'saveSupportTicket'])->name('save.support.ticket');
    Route::post('send/support/message', [SupportTicketController::class, 'sendSupportMessage'])->name('send.support.message');
});
