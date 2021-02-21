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

use \App\Http\Controllers\PublicControllers\CategoryPublicController;
use \App\Http\Controllers\PublicControllers\StorePublicController;
use \App\Http\Controllers\PublicControllers\ProductPublicController;

Route::get('/', [HomePublicController::class, 'home'])->name('public.home');
Route::get('categories', [CategoryPublicController::class, 'index'])->name('public.category.index');
Route::get('store/{store}', [StorePublicController::class, 'show'])->name('public.store.show');
Route::get('product/{product}', [ProductPublicController::class, 'show'])->name('public.product.show');

Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'auth',
], function () {
    Route::get('/', [DashboardController::class, 'home'])->name('dashboard.home');
    Route::resource('lookup', LookupController::class);
    Route::resource('script', ScriptController::class);
    Route::resource('script', ScriptController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('country', CountryController::class);
    Route::resource('city', CityController::class);
    Route::resource('area', AreaController::class);
    Route::resource('store', StoreController::class);
    Route::resource('specification', SpecificationController::class);
    Route::resource('option', OptionController::class);
    Route::resource('product', ProductController::class);
    Route::resource('offer', OfferController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('page', PageController::class);
    Route::resource('blog', BlogController::class);
    Route::get('orders', [OrderController::class, 'index'])->name('dashboard.order.index');
    Route::get('subscriber', [SubscriberController::class, 'index'])->name('dashboard.subscriber.index');
    Route::get('ticket', [TicketController::class, 'index'])->name('dashboard.ticket.index');
    Route::resource('user', UserController::class)->names([
        'index' => 'dashboard.user.index',
        'create' => 'dashboard.user.create',
        'edit' => 'dashboard.user.edit',
        'destroy' => 'dashboard.user.destroy',
    ]);
    Route::resource('permission-groups', PermissionGroupsController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles', RolesController::class);
});

require __DIR__.'/auth.php';
