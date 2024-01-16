<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\propertyTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//User Frontend All Route
Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Route to display the user's profile
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');

    // Route to store/update the user's profile information
    Route::post('/user/profile/store', [UserController::class, 'userProfileStore'])->name('user.profile.store');

    // Route to handle user logout
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');

    // Route to display the form for changing user's password
    Route::get('/user/change/password', [UserController::class, 'userChangePassword'])->name('user.change.password');

    // Route to update the user's password
    Route::post('/user/update/password', [UserController::class, 'userUpdatePassword'])->name('user.update.password');
});



require __DIR__ . '/auth.php';

// Middleware for the admin role
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin Dashboard Route
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    // Admin Lgout Route
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    //Admin Profile Route
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    //Update Admin Profile Route
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');
    //Admin Passwords Route
    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
    //Update Admin Passwords Route
    Route::post('/admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name('admin.update.password');
});

// Middleware for the agent role
Route::middleware(['auth', 'role:agent'])->group(function () {
    // Agent Dashboard Route
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});
// Admin Login Route
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

// All Type Property Route
Route::controller(propertyTypeController::class)->group(function () {
    Route::get('/all/type', 'allType')->name('all.type');
    Route::get('/add/type', 'addType')->name('add.type');
    Route::post('/store/type', 'storeType')->name('store.type');
    Route::get('/edit/{id}/type', 'editType')->name('edit.type');

    Route::post('/update/type', 'updateType')->name('update.type');
});
