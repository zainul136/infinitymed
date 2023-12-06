<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WeightLossController;
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


Route::get('/', [HomeController::class, 'index']);
Auth::routes();
Route::get('admin/login', [HomeController::class, 'getLogin'])->name('get-login');
Route::post('admin-login', [HomeController::class, 'storeAdminLogin'])->name('admin-login');

//Admin Routes
Route::middleware('auth:sanctum')->prefix('admin/')->group(function () {
     Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
     Route::get('all/user', [UserController::class, 'listUser'])->name('all-user');
     Route::get('profile/edit', [UserController::class, 'adminProfile'])->name('admin-profile');
     Route::post('update-admin-profile', [UserController::class, 'adminUpdateProfile'])->name('update-admin-profile');
     Route::resource('weight-loss', WeightLossController::class);
     Route::resource('question', QuestionController::class);
     Route::resource('product', ProductController::class);
    Route::resource('services', ServiceController::class);

});

//Frontend Route
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/service/{slug}', [FrontendController::class, 'cardDetails'])->name('card-details');


Route::post('/getServiceProducts', [FrontendController::class, 'getServiceProducts'])->name('getServiceProducts');
Route::get('/contact-us', [FrontendController::class, 'contactUS'])->name('contact-us');
Route::get('/edit-profile', [FrontendController::class, 'userProfile'])->name('edit-profile');
Route::post('/update-profile', [FrontendController::class, 'userUpdateProfile'])->name('update-profile');
Route::post('/submit-chat-bot', [ChatbotController::class, 'store'])->name('chatbot.submit');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/service/{slug}/assessment/', [FrontendController::class, 'assessment'])->name('assessment');
});
