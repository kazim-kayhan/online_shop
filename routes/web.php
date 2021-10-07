<?php

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\AboutComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\User\UserProfile;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ThankYouComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}/{scategory_slug?}', CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');
Route::get('/thankyou', ThankYouComponent::class)->name('thankyou');
Route::get('/contact-us', ContactComponent::class)->name('contact');
Route::get('/about-us', AboutComponent::class)->name('about-us');

//for normal user or customer
Route::middleware(['auth:sanctum', 'verified'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', UserDashboardComponent::class)->name('dashboard');
    Route::get('/orders', UserOrderComponent::class)->name('orders');
    Route::get('/orders/{order_id}', UserOrderDetailsComponent::class)->name('orderDetails');
    Route::get('/review/{order_item_id}', UserReviewComponent::class)->name('review');
    Route::get('/change-password', UserChangePasswordComponent::class)->name('changepassword');
    Route::get('/profile',UserProfile::class)->name('profile');
});

//for admin
Route::middleware(['auth:sanctum', 'verified','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', AdminDashboardComponent::class)->name('dashboard');

    Route::get('/categories', AdminCategoryComponent::class)->name('categories');
    Route::get('/category/add', AdminAddCategoryComponent::class)->name('addCategory');
    Route::get('/category/edit/{category_slug}/{scategory_slug?}', AdminEditCategoryComponent::class)->name('editCategory');

    Route::get('/products', AdminProductComponent::class)->name('products');
    Route::get('/product/add', AdminAddProductComponent::class)->name('addProduct');
    Route::get('/product/edit/{product_slug}', AdminEditProductComponent::class)->name('editProdcut');

    Route::get('/slider', AdminHomeSliderComponent::class)->name('homeSlider');
    Route::get('/slider/add', AdminAddHomeSliderComponent::class)->name('addHomeSlider');
    Route::get('/slider/edit{slide_id}', AdminEditHomeSliderComponent::class)->name('editHomeSlider');

    Route::get('/home-categories', AdminHomeCategoryComponent::class)->name('homeCategories');
    Route::get('/sale', AdminSaleComponent::class)->name('sale');

    Route::get('/coupon', AdminCouponsComponent::class)->name('coupons');
    Route::get('/coupon/add', AdminAddCouponsComponent::class)->name('addCoupon');
    Route::get('/coupon/edit/{coupon_id}', AdminEditCouponsComponent::class)->name('editCoupon');
    
    Route::get('/orders', AdminOrderComponent::class)->name('orders');
    Route::get('/orders/{order_id}', AdminOrderDetailsComponent::class)->name('orderDetails');
    Route::get('/contact-us', AdminContactComponent::class)->name('contact');
    Route::get('/settings', AdminSettingComponent::class)->name('settings');
});
