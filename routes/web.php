<?php

use App\Http\Livewire\Frontpage;
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
Route::group(['middleware' => ['auth:sanctum', 'verified','accessrole',]], function () 
{
    Route::get('register-step2', [App\Http\Controllers\RegisterStepTwoController::class, 'create'])->name('register-step2.create')->withoutMiddleware('accessrole');
    Route::post('register-step2', [App\Http\Controllers\RegisterStepTwoController::class, 'store'])->name('register-step2.store')->withoutMiddleware('accessrole');

    Route::get('user/{user}', [App\Http\Livewire\Users::class, 'show'])->name('user.show')->withoutMiddleware('accessrole');

    Route::group(['middleware' => ['registration_completed']], function() {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/pages', function () {
            return view('admin.pages');
        })->name('pages');

        Route::get('/navigation-menus', function () {
            return view('admin.navigation-menus');
        })->name('navigation-menus');

        Route::get('/roles', function () {
            return view('admin.roles');
        })->name('roles');

        Route::get('/users', function () {
            return view('admin.users');
        })->name('users');

        Route::get('/user-permissions', function () {
            return view('admin.user-permissions');
        })->name('user-permissions');
        
        Route::get('/specialties', function () {
            return view('admin.specialties');
        })->name('specialties');

        Route::get('/treatments', function () {
            return view('admin.treatments');
        })->name('treatments');

        Route::get('/sub-treatments', function () {
            return view('admin.sub-treatments');
        })->name('sub-treatments');
        
        Route::get('/experiences', function () {
            return view('admin.user-experience');
        })->name('user-experience');
        
        Route::get('/educations', function () {
            return view('admin.user-education');
        })->name('user-education');
        
        Route::get('/user-time-settings', function () {
            return view('admin.user-time-settings');
        })->name('user-time-settings');
    });
});

Route::get('/{urlslug}', Frontpage::class);
Route::get('/', Frontpage::class);