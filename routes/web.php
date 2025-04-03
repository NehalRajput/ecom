

<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController; // Updated import

// Public Routes
Route::get('/', function () {
    return view('customer.userpage');
})->name('userpage');

// Guest Routes (Only accessible when not logged in)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/account/process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
    Route::post('/account/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
});

// Protected Routes (Only accessible when logged in)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/account/dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
});



Route::group(['prefix' => 'admin'], function () {
    //guest middleware
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminLoginController::class,'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.authenticate');
    });
 
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('/categories/show', [CategoryController::class, 'show'])->name('admin.categories.show'); // Added show route
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });
    
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});
