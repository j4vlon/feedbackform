<?php

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
# For unauthorized users only
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'GetLogin'])->name('auth.signin');
    Route::post('/login', [AuthController::class, 'PostLogin'])->name('login');

    Route::get('/registration', [AuthController::class, 'ViewRegistration'])->name('registration');
    Route::post('/registration', [AuthController::class, 'PostRegistration']);
});

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

# For authorized users only

Route::group(['middleware' => 'auth'], function () {
    # For users with admin role only
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin', [AdminController::class, 'ShowAdminPage'])->name('admin');
        Route::post('/admin/{id}', [AdminController::class, 'CheckStatus'])->name('checkstatus');
    });
    # For authorized users only
    Route::group(['middleware' => 'user'], function () {
        Route::get('/feedback', [FeedbackController::class, 'ShowFeedbackPage']);
        Route::middleware('can_send')->group(function () {
            #Feedback
            Route::post('/feedback', [FeedbackController::class, 'SendFeedback'])->name('feedback');
        });

        # Route for logout 
        Route::get('/logout', function () {
            Auth::logout();
            return redirect('/login');
        })->name('logout');
    });
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});
