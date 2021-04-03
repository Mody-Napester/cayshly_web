<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicControllers\HomePublicController;
use App\Http\Controllers\DashboardControllers\DashboardController;
use \App\Http\Controllers\DashboardControllers\LookupController;
use \App\Http\Controllers\DashboardControllers\ScriptController;
use \App\Http\Controllers\DashboardControllers\CategoryController;
use \App\Http\Controllers\DashboardControllers\BrandController;
use \App\Http\Controllers\DashboardControllers\CountryController;
use \App\Http\Controllers\DashboardControllers\CityController;
use \App\Http\Controllers\DashboardControllers\AreaController;
use \App\Http\Controllers\DashboardControllers\StoreController;
use \App\Http\Controllers\DashboardControllers\SpecificationController;
use \App\Http\Controllers\DashboardControllers\OptionController;
use \App\Http\Controllers\DashboardControllers\ProductController;
use \App\Http\Controllers\DashboardControllers\OfferController;
use \App\Http\Controllers\DashboardControllers\ContactController;
use \App\Http\Controllers\DashboardControllers\PageController;
use \App\Http\Controllers\DashboardControllers\BlogController;
use \App\Http\Controllers\DashboardControllers\OrderController;
use \App\Http\Controllers\DashboardControllers\SubscriberController;
use \App\Http\Controllers\DashboardControllers\TicketController;
use \App\Http\Controllers\DashboardControllers\PermissionGroupsController;
use \App\Http\Controllers\DashboardControllers\PermissionsController;
use \App\Http\Controllers\DashboardControllers\RolesController;
use \App\Http\Controllers\DashboardControllers\UserController;
use \App\Http\Controllers\DashboardControllers\SliderController;
use \App\Http\Controllers\DashboardControllers\SocialController;
use \App\Http\Controllers\DashboardControllers\ReportController;

use \App\Http\Controllers\LanguagesController;

use \App\Http\Controllers\PublicControllers\CategoryPublicController;
use \App\Http\Controllers\PublicControllers\StorePublicController;
use \App\Http\Controllers\PublicControllers\BrandPublicController;
use \App\Http\Controllers\PublicControllers\ProductPublicController;
use \App\Http\Controllers\PublicControllers\OfferPublicController;
use \App\Http\Controllers\PublicControllers\UserPublicController;
use \App\Http\Controllers\PublicControllers\WishlistPublicController;
use \App\Http\Controllers\PublicControllers\PointPublicController;
use \App\Http\Controllers\PublicControllers\PagePublicController;
use \App\Http\Controllers\PublicControllers\CartPublicController;
use \App\Http\Controllers\PublicControllers\AddressPublicController;
use \App\Http\Controllers\PublicControllers\OrderPublicController;
use \App\Http\Controllers\PublicControllers\SearchPublicController;

// Site Languages
Route::get('language/{language}', [LanguagesController::class, 'setLanguage'])->name('language');

Route::get('/', [HomePublicController::class, 'home'])->name('public.home');

Route::get('categories', [CategoryPublicController::class, 'index'])->name('public.category.index');
Route::get('category/{category}', [CategoryPublicController::class, 'show'])->name('public.category.show');
Route::get('category/products/{category}', [CategoryPublicController::class, 'products'])->name('public.category.product.index');

Route::get('stores', [StorePublicController::class, 'index'])->name('public.store.index');
Route::get('store/{store}', [StorePublicController::class, 'show'])->name('public.store.show');

Route::get('brands', [BrandPublicController::class, 'index'])->name('public.brand.index');
Route::get('brand/{brand}', [BrandPublicController::class, 'show'])->name('public.brand.show');
Route::get('brand/products/{brand}', [BrandPublicController::class, 'products'])->name('public.brand.product.index');

Route::get('products/best-sales', [ProductPublicController::class, 'index_best_sales_products'])->name('public.product.best.index');
Route::get('products/by-free', [ProductPublicController::class, 'index_by_free_products'])->name('public.product.free.index');
Route::get('product/{product}', [ProductPublicController::class, 'show'])->name('public.product.show');

Route::get('offers', [OfferPublicController::class, 'index'])->name('public.offer.index');

Route::get('page/{page}', [PagePublicController::class, 'show'])->name('public.page.show');

// Cart
Route::post('cart', [CartPublicController::class, 'store'])->name('public.cart.store');
Route::post('cart/remove', [CartPublicController::class, 'remove'])->name('public.cart.remove');
Route::post('cart/update', [CartPublicController::class, 'update'])->name('public.cart.update');
//Route::get('cart/{product_uuid}/remove', [CartPublicController::class, 'remove'])->name('public.cart.remove');
Route::get('cart/empty_cart', [CartPublicController::class, 'empty_cart'])->name('public.cart.empty_cart');
Route::get('cart/details', [CartPublicController::class, 'details'])->name('public.cart.details');
Route::get('cart/user/details', [CartPublicController::class, 'user_details'])->name('public.cart.user.details');

// Search
Route::get('search/{product}', [SearchPublicController::class, 'index'])->name('public.search.index');

Route::group([
    'middleware' => 'auth',
], function () {
    // User
    Route::get('user/{user}', [UserPublicController::class, 'show'])->name('public.user.show');
    Route::put('user/update', [UserPublicController::class, 'update'])->name('public.user.update');

    // Address
    Route::post('address', [AddressPublicController::class, 'store'])->name('public.address.store');
    Route::get('address', [AddressPublicController::class, 'index'])->name('public.address.index');

    // Cart
    Route::get('cart/payment', [CartPublicController::class, 'payment'])->name('public.cart.payment');
    Route::get('cart/review', [CartPublicController::class, 'review'])->name('public.cart.review');
    Route::get('cart/checkout/complete', [CartPublicController::class, 'complete'])->name('public.cart.complete');

    // Orders
    Route::get('orders', [OrderPublicController::class, 'index'])->name('public.order.index');

    // Wishlist
    Route::get('wishlist', [WishlistPublicController::class, 'index'])->name('public.wishlist.index');
    Route::post('wishlist', [WishlistPublicController::class, 'store'])->name('public.wishlist.store');
    Route::delete('wishlist/{wishlist}', [WishlistPublicController::class, 'destroy'])->name('public.wishlist.destroy');

    // Point
    Route::get('point', [PointPublicController::class, 'index'])->name('public.point.index');
});


Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'auth',
], function () {
    Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home');
    Route::get('reports/points', [ReportController::class, 'points'])->name('dashboard.point.index');
    Route::get('product/export', [ProductController::class, 'export'])->name('product.export');
    Route::post('product/import', [ProductController::class, 'import'])->name('product.import');
    Route::resource('lookup', LookupController::class);
    Route::resource('script', ScriptController::class);
    Route::resource('script', ScriptController::class);
    Route::resource('category', CategoryController::class);
    Route::post('category/specifications', [CategoryController::class, 'index_specifications'])->name('category.specifications.index');
    Route::resource('brand', BrandController::class);
    Route::resource('country', CountryController::class);
    Route::resource('city', CityController::class);
    Route::resource('area', AreaController::class);
    Route::resource('store', StoreController::class);
    Route::resource('specification', SpecificationController::class);
    Route::resource('option', OptionController::class);
    Route::post('option/child', [OptionController::class, 'index_child'])->name('option.child.index');
    Route::resource('product', ProductController::class);
    Route::resource('offer', OfferController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('page', PageController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('social', SocialController::class);
    Route::get('orders', [OrderController::class, 'index'])->name('dashboard.order.index');
    Route::get('orders/{order}/details', [OrderController::class, 'details'])->name('dashboard.order.details');
    Route::post('update-order-details', [OrderController::class, 'update_details'])->name('dashboard.order.details.update');
    Route::get('subscriber', [SubscriberController::class, 'index'])->name('dashboard.subscriber.index');
    Route::get('ticket', [TicketController::class, 'index'])->name('dashboard.ticket.index');
    Route::resource('user', UserController::class);
    Route::get('user/login_as/{user}', [UserController::class, 'login_as'])->name('user.login_as');
//        ->names([
//        'index' => 'dashboard.user.index',
//        'create' => 'dashboard.user.create',
//        'edit' => 'dashboard.user.edit',
//        'destroy' => 'dashboard.user.destroy',
//    ]);
    Route::resource('permission-groups', PermissionGroupsController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles', RolesController::class);
});

require __DIR__.'/auth.php';
