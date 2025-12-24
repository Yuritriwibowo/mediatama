<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\EventController;
use App\Models\Banner;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// ===============================
// HOME
// ===============================
Route::get('/', function () {
    $banners = Banner::all();
    $events = \App\Models\Event::latest()->take(6)->get();
    return view('home', compact('banners', 'events'));
});


// ===============================
// PRODUK
// ===============================
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.show');

// ===============================
// CART
// ===============================
Route::get('/keranjang', [ProductController::class, 'cartPage'])->name('cart.page');
Route::get('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/increase/{id}', [ProductController::class, 'increaseQty'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [ProductController::class, 'decreaseQty'])->name('cart.decrease');
Route::post('/cart/remove/{id}', [ProductController::class, 'removeItem'])->name('cart.remove');
Route::get('/cart/checkout', [ProductController::class, 'checkoutWa'])->name('cart.checkout');

// ===============================
// COMPANY PAGES
// ===============================
Route::view('/profil', 'profile')->name('profile');
Route::view('/cabang', 'cabang')->name('cabang');

// ===============================
// EVENT (PUBLIC)
// ===============================
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');

// ===============================
// AUTH
// ===============================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ===============================
// AJAX PRODUK (FILTER & SEARCH)
// ===============================
Route::get('/ajax/filter-kategori', [ProductController::class, 'ajaxFilterCategory'])
    ->name('ajax.filter.kategori');

Route::get('/ajax/search-produk', [ProductController::class, 'ajaxSearch'])
    ->name('ajax.search.produk');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {


    

    Route::get('/admin/dashboard', [ProductController::class, 'dashboard'])
    ->name('admin.dashboard');


    // ===============================
    // ADMIN PRODUK
    // ===============================
    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin/products/{id}/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.delete');

    // ===============================
    // ADMIN EVENT
    // ===============================
    Route::get('/admin/events', [EventController::class, 'adminIndex'])->name('admin.events.index');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events/store', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{id}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::post('/admin/events/{id}/update', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/admin/events/{id}', [EventController::class, 'destroy'])->name('admin.events.delete');

    // ADMIN DP
    Route::get('/admin/dp', function () {
        $dpList = \App\Models\DpConfirmation::latest()->get();
        return view('admin.dp.index', compact('dpList'));
    })->name('admin.dp.index');

    Route::post('/admin/dp/{id}/confirm', function ($id) {
        $dp = \App\Models\DpConfirmation::findOrFail($id);
        $dp->update(['status' => 'confirmed']);

        return redirect()->route('admin.dp.index')
            ->with('success', 'DP berhasil dikonfirmasi.');
    })->name('admin.dp.confirm');

});
