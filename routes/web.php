<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Store;
use App\Http\Controllers\User;
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

        /* Store routes that do not require authentication or authorization */
Route::get('/', [Store\StoreController::class, 'home'])->name('home');
Route::get('/products/{product_id}', [Store\ProductController::class, 'show'])->name('store.products.view');
Route::get('/categories/{category_id}', [Store\CategoryController::class, 'display'])->name('store.category.view');
Route::get('/shop', [Store\ProductController::class, 'display'])->name('store.shop');
Route::get('/shop/brands', [Store\BrandController::class, 'display'])->name('store.shop.brands.display');
Route::get('/shop/brands/{brand_id}', [Store\BrandController::class, 'show'])->name('store.shop.brands.show');
Route::get('/coupons', [Store\CouponController::class, 'show'])->name('store.coupon.show');

// cart routes
Route::get('/cart', [Store\CartController::class, 'show'])->name('store.carts.show');
Route::post('/cart', [Store\CartController::class, 'create'])->name('store.carts.create');
Route::patch('/cart', [Store\CartController::class, 'update'])->name('store.carts.patch');
Route::get('/cart/remove/{id}', [Store\CartController::class, 'delete'])->name('store.carts.delete');
Route::post('/cart/apply/coupon', [Store\CartController::class, 'apply'])->name('store.coupon.apply');




// user protected routes
Route::prefix('user')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/index', [User\HomeController::class, 'show'])->name('auth.user.show');
    Route::get('/orders', [User\OrdersController::class, 'display'])->name('auth.user.orders');
    Route::get('/orders/{order_id}', [User\OrdersController::class, 'show'])->name('auth.user.orders.show');
    Route::get('/address', [User\AddressController::class, 'show'])->name('auth.user.address');
    Route::get('/address/add', [User\AddressController::class, 'showform'])->name('auth.user.address.showform');
    Route::post('/address/add', [User\AddressController::class, 'create'])->name('auth.user.address.create');
    Route::get('/wishlist', [User\WishlistController::class, 'show'])->name('auth.user.wishlist');
    Route::get('/wishlist/remove/{product_id}', [User\WishlistController::class, 'delete'])->name('auth.user.wishlist.delete');
    Route::get('/profile', [ProfileController::class, 'show'])->name('auth.user.profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('auth.user.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('auth.user.profile.destroy');
    Route::get('password', [PasswordController::class, 'show'])->name('auth.user.password.show');
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::get('/logout', [User\HomeController::class, 'showlogoutform'])->name('auth.user.showlogoutform');
});

// user protected routes
Route::middleware(['auth', 'verified'])->group(function(){
    // checkout requires users to be authenticated and email verified
    // this would avoid user email errors
    // Route::get('checkout/confirmation', [Store\CheckoutController::class, 'show'])->name('checkout');
    Route::get('/checkout', [Store\CheckoutController::class, 'show'])->name('auth.checkout.show');
    Route::post('/checkout', [Store\CheckoutController::class, 'create'])->name('auth.checkout.create');
    Route::get('/checkout/confirmation', [Store\CheckoutController::class, 'confirm'])->name('auth.checkout.confirm');
    Route::post('/checkout/Payment', [Store\CheckoutController::class, 'redirectToGateway'])->name('auth.checkout.redirectToGateway');
    Route::get('/checkout/OrderRecieved', [Store\PurchaseController::class, 'handleGatewayCallback'])->name('auth.checkout.handleGatewayCallback');
});

Route::middleware('auth')->group(function () {
    Route::get('/change-email', [ProfileController::class, 'changeemail'])->name('auth.user.profile.changeemail');
    Route::patch('/change-email', [ProfileController::class, 'updateemail'])->name('auth.user.profile.changeemail.update');
    
});

/** ----------- Admin Routes requiring Authentication---------------- */
Route::prefix('admin')->group(function() {
    // middleware protected admin routes
    Route::middleware('admin')->group(function(){
        Route::get('/dashboard', [Admin\AdminController::class, 'index'])->name('admin.home');


        // routes to manipulate admins
        Route::get('/advert-banner', [Admin\AdvertController::class, 'display'])->name('admin.advert-banner');
        Route::get('/advert-banner/new', [Admin\AdvertController::class, 'show'])->name('admin.advert-banner.new');
        Route::post('/advert-banner/new', [Admin\AdvertController::class, 'create'])->name('admin.advert-banner.create');
        Route::get('/advert-banner/update/{advert_banner_id}', [Admin\AdvertController::class, 'update'])->name('admin.advert-banner.update');
        Route::get('/advert-banner/remove/{advert_banner_id}', [Admin\AdvertController::class, 'patch'])->name('admin.advert-banner.patch');
        Route::get('/advert-banner/delete/{advert_banner_id}', [Admin\AdvertController::class, 'delete'])->name('admin.advert-banner.delete');


        // routes to manipulate users
        Route::get('/users', [Admin\UserController::class, 'display'])->name('admin.users.show');
        Route::get('/users/{user_id}', [Admin\UserController::class, 'show'])->name('admin.users.show.one');

        // routes to manipulate brands
        
        Route::get('/brands', [Admin\BrandController::class, 'display'])->name('admin.brands');
        Route::get('/brands/new', [Admin\BrandController::class, 'show'])->name('admin.brand.new');
        Route::post('/brands/new', [Admin\BrandController::class, 'create'])->name('admin.brand.create');
        Route::get('/brands/{brand_id}', [Admin\BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::patch('/brands/update', [Admin\BrandController::class, 'update'])->name('admin.brand.patch');
        Route::delete('/brands/delete', [Admin\BrandController::class, 'delete'])->name('admin.brand.delete');
        

        // routes to manipulate categories
        Route::get('/categories', [Admin\CategoryController::class, 'display'])->name('admin.categories');
        Route::get('/categories/new', [Admin\CategoryController::class, 'show'])->name('admin.category.new');
        Route::post('/categories/new', [Admin\CategoryController::class, 'create'])->name('admin.category.create');
        Route::get('/categories/{category_id}', [Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/categories/update', [Admin\CategoryController::class, 'update'])->name('admin.category.patch');
        Route::delete('/categories/delete', [Admin\CategoryController::class, 'delete'])->name('admin.category.delete');

        // routes to manipulate coupons
        Route::get('/coupons', [Admin\CouponController::class, 'display'])->name('admin.coupons');
        Route::get('/coupons/new', [Admin\CouponController::class, 'show'])->name('admin.coupon.new');
        Route::post('/coupons/new', [Admin\CouponController::class, 'create'])->name('admin.coupon.create');
        Route::get('/coupons/delete/{coupon_id}', [Admin\CouponController::class, 'delete'])->name('admin.coupon.delete');

        // routes to manipulate coupons
        Route::get('/discount', [Admin\DiscountController::class, 'display'])->name('admin.discount');
        Route::get('/discount/new', [Admin\DiscountController::class, 'show'])->name('admin.discount.new');
        Route::post('/discount/new', [Admin\DiscountController::class, 'create'])->name('admin.discount.create');
        Route::get('/discount/stop/{discount_id}', [Admin\DiscountController::class, 'pause'])->name('admin.discount.stop');
        Route::get('/discount/start/{discount_id}', [Admin\DiscountController::class, 'start'])->name('admin.discount.start');
        Route::get('/discount/delete/{discount_id}', [Admin\DiscountController::class, 'delete'])->name('admin.discount.delete');


        // routes to manipulate logo
        Route::get('/logo', [Admin\LogoController::class, 'show'])->name('admin.logo');
        Route::post('/logo', [Admin\LogoController::class, 'create'])->name('admin.logo.create');

        // routes to manipulate logo
        Route::get('/store-banner', [Admin\BannerController::class, 'show'])->name('admin.store-banner');
        Route::get('/store-banner/remove/{banner_id}', [Admin\BannerController::class, 'update'])->name('admin.store-banner.update');
        Route::post('/store-banner', [Admin\BannerController::class, 'create'])->name('admin.store-banner.create');

        // route to manipulate products
        Route::get('/products', [Admin\ProductController::class, 'display'])->name('admin.products');
        Route::get('/products/new', [Admin\ProductController::class, 'show'])->name('admin.product.new');
        Route::post('/products/new', [Admin\ProductController::class, 'create'])->name('admin.product.create');
        Route::patch('/products/remove/product-image/', [Admin\ProductController::class, 'remove_image'])->name('admin.product.remove_image');
        Route::get('/products/{product_id}', [Admin\ProductController::class, 'edit'])->name('admin.product.edit');
        Route::patch('/products/update', [Admin\ProductController::class, 'update'])->name('admin.product.patch');
        Route::delete('/products/delete', [Admin\ProductController::class, 'delete'])->name('admin.product.delete');


        //order routes 
        Route::get('/orders', [Admin\OrdersController::class, 'display'] )->name('admin.orders.display');
        Route::post('/orders/new', [Admin\OrdersController::class, 'create'] )->name('admin.orders.create');
        Route::get('/orders/new', [Admin\OrdersController::class, 'add'] )->name('admin.orders.add');
        Route::get('/orders/{order_id}', [Admin\OrdersController::class, 'show'] )->name('admin.orders.show');
        
        Route::delete('orders', [Admin\OrdersController::class, 'delete'] )->name('admin.orders.delete');

         //order purchase 
        Route::get('/purchase', [Admin\PurchaseController::class, 'display'] )->name('admin.purchase.display');
        Route::get('/purchase/{purchase_id}', [Admin\PurchaseController::class, 'show'] )->name('admin.purchase.show');

        Route::get('/profile', [Admin\ProfileController::class, 'show'])->name('admin.profile');
        Route::patch('/profile', [Admin\ProfileController::class, 'update'])->name('admin.profile.patch');
        Route::delete('/profile/delete', [Admin\ProfileController::class, 'delete'])->name('admin.profile.delete');
        
        Route::post('logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');

        // SUPER ADMIN MIDDLEWARE PROTECTED
        Route::get('/manage/admin', [Admin\SuperAdminController::class, 'index'])->name('admin.admins');
        Route::get('/manage/admin/verify/{admin_id}', [Admin\SuperAdminController::class, 'verify'])->name('admin.admin.verify');
        Route::get('/manage/admin/unverify/{admin_id}', [Admin\SuperAdminController::class, 'unverify'])->name('admin.admin.unverify');
        Route::get('/manage/admin/upgrade/{admin_id}', [Admin\SuperAdminController::class, 'upgrade'])->name('admin.admin.upgrade');
        Route::delete('/manage/admin/delete', [Admin\SuperAdminController::class, 'delete'])->name('admin.admin.delete');
        
    });
});
/** ----------- Admin Routes requiring Authentication ends here ---------------- */


require __DIR__.'/adminauth.php';
require __DIR__.'/auth.php';
