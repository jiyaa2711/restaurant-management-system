<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    AuthController,
    AdminDashboard,
    UserDashboard,
    FeedbackController,
    MealController,
    CategoryController,
    CartController,
    OrderController,
    AdminController,
    BookingController,
    VisitorController
};

// --- Public Routes ---
Route::get('/', [VisitorController::class, 'index'])->name('home');
Route::get('/about', [VisitorController::class, 'about'])->name('user.about');

// --- Guest Routes ---
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerprocess'])->name('register.process');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginprocess'])->name('login.process');
});

// --- Meal Details & Listing ---
Route::get('/meal-details/{id}', function ($id) {
    return Auth::check() ? App::make(UserDashboard::class)->show($id) : App::make(VisitorController::class)->show($id);
})->name('user.meal_details');

Route::get('/meals', function (Request $request) {
    return Auth::check() ? App::make(UserDashboard::class)->meals($request) : App::make(VisitorController::class)->meals($request);
})->name('user.meals');

// --- User Authenticated Routes ---
Route::middleware(['auth'])->group(function () {
    
    Route::get('/user/dashboard', [UserDashboard::class, 'dashboard'])->name('user.dashboard');
    Route::get('/contact', [UserDashboard::class, 'contact'])->name('user.contact');
    Route::post('/contact/store', [UserDashboard::class, 'storeContact'])->name('contact.store');

    // Cart Section
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::get('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove.from.cart');
    
    // Order Flow
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
    Route::get('/thank-you', [OrderController::class, 'thankYou'])->name('order.thankyou');
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('user.my_orders');

    // Table Booking
    Route::get('/book-table', [UserDashboard::class, 'book_table'])->name('user.book_table');
    Route::post('/book-table', [BookingController::class, 'store'])->name('user.book_table.store');

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('user.feedback');
    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

// --- Admin Routes ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminDashboard::class, 'users'])->name('users');
    Route::delete('/users/delete/{id}', [AdminDashboard::class, 'deleteUser'])->name('users.delete');
    
    // Meal Routes
    Route::get('/meals', [MealController::class, 'index'])->name('meals.index');
    Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');
    Route::post('/meals/store', [MealController::class, 'store'])->name('meals.store');
    Route::get('/meals/edit/{id}', [MealController::class, 'edit'])->name('meals.edit');
    Route::put('/meals/update/{id}', [MealController::class, 'update'])->name('meals.update');
    Route::delete('/meals/delete/{id}', [MealController::class, 'delete'])->name('meals.delete');
    
    // Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
    
    Route::get('/orders', [AdminController::class, 'viewOrders'])->name('orders');
    Route::get('/check-new-orders', [AdminController::class, 'checkNewOrders'])->name('check.new.orders');
    Route::get('/order-status/{id}/{status}', [AdminController::class, 'updateStatus'])->name('order.status');
    
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('bookings');
    Route::post('/bookings/update/{id}', [BookingController::class, 'updateStatus'])->name('update_status');
    Route::get('/feedback', [FeedbackController::class, 'adminIndex'])->name('feedback_list');
});