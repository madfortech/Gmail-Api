<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GmailDraftController;

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


Auth::routes();

require base_path('routes/social.php');
 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change Profile
    if (file_exists(app_path('Http/Controllers/Auth/ChangeProfileController.php'))) {
        Route::get('/profile', [App\Http\Controllers\Auth\ChangeProfileController::class, 'edit']);
        Route::post('/profile', [App\Http\Controllers\Auth\ChangeProfileController::class, 'update'])->name('profile.update');
    }

    // Change Profile
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('/password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'edit'])->name('password.edit');
        Route::post('/password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'update'])->name('password.update');

    }
});

Route::get('/gmail/drafts', [App\Http\Controllers\GmailDraftController::class, 'getDrafts'])->name('gmail.getDrafts');

