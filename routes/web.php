

<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use App\Models\Category;

// Customer/Public Routes
Route::get('/', function () {
    $categories = Category::all();
    $query = Product::with('category');
    
    if (request('category')) {
        $query->where('category_id', request('category'));
    }
    
    $products = $query->orderBy('created_at', 'DESC')->get();
    return view('customer.userpage', compact('products', 'categories'));
})->name('userpage');

Route::get('/products', function () {
    $products = Product::with('category')->orderBy('created_at', 'DESC')->get();
    $categories = Category::all();
    return view('customer.product', compact('products', 'categories'));
})->name('products');

// Customer Authentication Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/account/process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
    Route::post('/account/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
});

// Customer Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/account/dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Admin Guest Routes
    Route::middleware(['admin.guest'])->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.authenticate');
    });

    // Admin Protected Routes
    Route::middleware(['admin.auth'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        
        // Category Management
        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
            Route::get('/show', [CategoryController::class, 'show'])->name('admin.categories.show');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
            Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        });

        // Product Management
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.products');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
            Route::post('/', [ProductController::class, 'store'])->name('admin.products.store');
            Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
            Route::put('/{product}', [ProductController::class, 'update'])->name('admin.products.update');
            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        });

        // Admin Logout
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});
