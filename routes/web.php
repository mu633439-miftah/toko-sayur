<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Models\Product;
use App\Models\Transaction;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;

// ================= AUTH =================
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisForm'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');


// =================WITH LOGIN=================
Route::middleware('auth')->group(
    function () {
        // =========== ADMIN =================
        Route::middleware(IsAdmin::class)->group(
            function () {
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
                // crud user
                Route::get('/admin/users', [UserController::class, 'listUser'])->name('admin.users');
                Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.user.show');
                Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.user.store');
                Route::put('/admin/users/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
                Route::delete('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
                // crud supplier
                Route::get('/admin/suppliers', [SupplierController::class, 'index'])->name('admin.suppliers');
                Route::get('/admin/suppliers/{id}', [SupplierController::class, 'show'])->name('admin.supplier.show');
                Route::post('/admin/suppliers/store', [SupplierController::class, 'store'])->name('admin.supplier.store');
                Route::put('/admin/suppliers/update/{id}', [SupplierController::class, 'update'])->name('admin.supplier.update');
                Route::delete('/admin/suppliers/delete/{id}', [SupplierController::class, 'destroy'])->name('admin.supplier.delete');
                // crud product dan stock
                Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
                Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.product.store');
                Route::get('/admin/products/{id}', [ProductController::class, 'show'])->name('admin.product.show');
                Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.product.update');
                Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
                Route::put('/balance/product/{id}', [ProductController::class, 'updateBalance'])->name('admin.product.update-balance');
                // transaksi admin
                Route::get('/admin/orders', [TransactionController::class, 'listOrder'])->name('admin.order-list');
                Route::get('/admin/transaksis', [TransactionController::class, 'listTransaksi'])->name('admin.transaksi-list');
                Route::delete('/admin/transaksis/{id}', [TransactionController::class, 'destroy'])->name('admin.transaksi.delete');
            }
        );

        // ========== USER =================
        Route::middleware(IsUser::class)->group(
            function () {
                Route::get('/home',  [HomeController::class, 'index'])->name('home');
                Route::get('/products', [ProductController::class, 'listProduct'])->name('products');
                Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
                Route::post('/checkout', [TransactionController::class, 'storeTransaksi'])->name('checkout');
                Route::get('/transactions',  [TransactionController::class, 'listTransaksiUser'])->name('transactions');
                Route::post('/transaksi/pay/{id}', [TransactionController::class, 'payTransaksi'])->name('pay-transaksi');
                Route::put('/transaksi/pay/status', [TransactionController::class, 'updateStatusTransaksi'])->name('transaksi.update-status');
                Route::put('/transaksi/cancel/{id}', [TransactionController::class, 'cancelTransaksi'])->name('transaksi.cancel');
            }
        );
    }
);

// ============= USER ========================
// home
// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/user/products', [ProductController::class, 'listProducts'])->name('list-product.user');
// Route::post('/user/checkout', [TransactionController::class, 'storeTransaksi'])->name('checkout-user');
// Route::get('/user/transaksis', [TransactionController::class, 'listTransaksiUser'])->name('transaksi-user');
