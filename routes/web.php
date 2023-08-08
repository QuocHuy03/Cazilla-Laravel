<?php

use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// # PAGE
*/

Route::get('/', [IndexController::class, 'home'])->name('/');
Route::get('/categorys/{slug}-{id}', [IndexController::class, 'getListProducts'])->name('products');
Route::get('/detail/{slug}', [IndexController::class, 'detail'])->name('products_detail');

# ----------------------------------------- Auth -------------------------------------------- #
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'DoLogin'])->name('auth.login.post');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'DoRegister'])->name('auth.register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/account-profile', [AuthController::class, 'showProfile'])->name('showProfile');
    Route::post('/account-profile', [AuthController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/account-orders', [AuthController::class, 'showProfileOrder'])->name('showProfileOrder');
    Route::get('/account-address', [AuthController::class, 'showProfileAddress'])->name('showProfileAddress');
    Route::get('/account-payment', [AuthController::class, 'showProfilePayment'])->name('showProfilePayment');
});
# ----------------------------------------- Checkout ----------------------------------------- #
Route::prefix('/cart')->middleware('auth')->group(function () {
    Route::get('/show', [ProductController::class, 'showCart'])->name('listCart');
    Route::post('/show', [ProductController::class, 'addOrder'])->name('addOrder');
    Route::get('/add/{id}', [ProductController::class, 'addCart'])->name('addToCart');
    Route::get('/remove/{id}', [ProductController::class, 'removeCart'])->name('removeCart');
    Route::post('/update', [ProductController::class, 'updateCart'])->name('cartUpdate');
    Route::get('/checkout', [OrderController::class, 'showOrder'])->name('showOrder');
    Route::get('/orders', [OrderController::class, 'showOrders'])->name('showOrders');
    Route::get('/payment', [CreditController::class, 'showPayment'])->name('showPayment');
    Route::post('/payment', [CreditController::class, 'addCredit'])->name('addCredit');
    Route::get('/detail/{slug}', [OrderController::class, 'showReviews'])->name('showReviews');
    Route::get('/complete', [OrderController::class, 'showComplete'])->name('showComplete');
    Route::get('/status-complete/{id}', [OrderController::class, 'statusComplete'])->name('statusComplete');
});
# ----------------------------------------- Admin -------------------------------------------- #
Route::prefix('/admin')->middleware('admin')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('admin.index');
    # add products
    Route::get('/products', [PageController::class, 'viewProducts'])->name('admin.pages.products');
    Route::post('/products/add', [PageController::class, 'addProducts'])->name('admin.products.post');
    # edit products
    Route::get('/products/edit/{id}', [PageController::class, 'editProducts'])->name('admin.products.edit');
    Route::post('/products/edit/{id}', [PageController::class, 'DoEditProducts'])->name('admin.products.edit.post');
    # delete products
    Route::get('/products/delete/{id}', [PageController::class, 'deleteProducts'])->name('admin.products.delete');
    # add category
    Route::get('/category', [PageController::class, 'viewCategory'])->name('admin.pages.category');
    Route::post('/category/add', [PageController::class, 'addCategory'])->name('admin.category.post');
    # edit category
    Route::get('/category/edit/{id}', [PageController::class, 'editCategory'])->name('admin.category.edit');
    Route::post('/category/edit/{id}', [PageController::class, 'DoEditCategory'])->name('admin.category.edit.post');
    # delete category
    Route::get('/category/delete/{id}', [PageController::class, 'deleteCategory'])->name('admin.category.delete');
    # view users
    Route::get('/users', [PageController::class, 'viewUsers'])->name('admin.pages.users');
    # edit products
    Route::get('/users/edit/{id}', [PageController::class, 'editUsers'])->name('admin.users.edit');
    Route::post('/users/edit/{id}', [PageController::class, 'DoEditUsers'])->name('admin.users.edit.post');
    # delete products
    Route::get('/users/delete/{id}', [PageController::class, 'deleteUsers'])->name('admin.users.delete');
    # ----------------------------------------- Pages -------------------------------------------- #
    Route::get('/listOrders', [AdminOrdersController::class, 'listOrders'])->name('admin.pages.orders');
    Route::get('/listOrderDetails/{slug}', [AdminOrdersController::class, 'detailOrders'])->name('detailOrders');
    Route::get('/status-delivering/{id}', [AdminOrdersController::class, 'statusDelivering'])->name('statusDelivering');
});
