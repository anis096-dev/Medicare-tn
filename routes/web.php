<?php

use App\Http\Livewire\FrontPage;
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

Route::group(['middleware' => ['auth:sanctum', 'verified', 'accessrole',]], function () {
    Route::get('/add-phone',  'App\Http\Controllers\VerifyPhoneController@create')->name('add-phone');
    Route::post('/store-phone', 'App\Http\Controllers\VerifyPhoneController@store')->name('store-phone');
    Route::get('/verify-show', 'App\Http\Controllers\VerifyPhoneController@verifyShow')->name('verify-show');
    Route::post('/verify', 'App\Http\Controllers\VerifyPhoneController@verify')->name('verify');

    Route::group(['middleware' => ['verify_phone']], function () {
        Route::get('/user/{user}', [App\Http\Livewire\Users::class, 'show'])->name('user.show');
        Route::get('/register-step2', function () {
            return view('admin.register-step-two');
        })->name('register-step2');
        Route::get('/ensure-identity', function () {
            return view('admin.ensure-identity');
        })->name('ensure-identity');

        Route::group(['middleware' => ['registration_completed']], function () {
            Route::group(['middleware' => ['ensure_identity']], function () {
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

                Route::get('/all-appointments', function () {
                    return view('admin.all-appointments');
                })->name('all-appointments');

                Route::get('/e-health-appointments', function () {
                    return view('admin.e-health-appointments');
                })->name('e-health-appointments');

                Route::get('/patient-appointments', function () {
                    return view('admin.patient-appointments');
                })->name('patient-appointments');

                Route::get('/contacts-from-website', function () {
                    return view('admin.contacts-from-website');
                })->name('contacts-from-website');

                Route::get('/treatments-prices', function () {
                    return view('admin.treatmentsPrices');
                })->name('treatments-prices');

                Route::get('/admin-faqs', function () {
                    return view('admin.faqs');
                })->name('admin-faqs');
            });
        });
    });
});
Route::get('/', Frontpage::class);
Route::get('/{urlslug}', Frontpage::class);