<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\resetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DokumenController;
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
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified' // verify email
])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
});

// Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

// Route::resource('/dashboard',[UserController::class]);


Route::get('/forget-password',[DashboardController::class, 'forgetPassword'])->name('forgetPassword');

Route::get('/reset-password',[DashboardController::class, 'resetPassword'])->name('resetPassword');
Route::get('/reset/{user}', [resetPasswordController::class, 'reset'])->name('reset');
Route::resource('/dashboard/documents',DokumenController::class);
Route::resource('/dashboard/users',UserController::class);

// Route::resource('/dashboard/user',[UserController::class]);
// dashboard admin

// Route::middleware(['auth'])->group(function(){
//     // dashboard
//     Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

//     // user dashboard
//     Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function(){
//         Route::get('/', [UserController::class, 'index'])->name('dashboard');
//     });

//     // admin dashboard
//     Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
//         Route::get('/',[AdminDashboard::class,'index'])->name('dashboard');

//     });

//     // Route::get('dashboard/checkout/invoice/{checkout}',[CheckoutController::class, 'invoice'])->name('user.checkout.invoice');
// });

// require __DIR__.'/auth.php';




