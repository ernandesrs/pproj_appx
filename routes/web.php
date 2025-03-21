<?php

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
    return redirect()->route('admin.overview');
})->name('home');

/**
 *
 *
 * Auth
 *
 *
 */
Route::group([
    'prefix' => 'auth'
], function () {

    Route::group([
        'middleware' => ['guest']
    ], function () {

        Route::get('/login', \App\Livewire\Auth\Login::class)->name('auth.login');

    });

    Route::group([
        'middleware' => ['auth']
    ], function () {

        Route::get('/logout', function () {
            \Auth::logout();
            return redirect()->route('auth.login');
        })->name('auth.logout');

    });

});

/**
 *
 *
 * Admin
 *
 *
 */
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth']
], function () {

    Route::get('/', \App\Livewire\Admin\Overview::class)->name('admin.overview');

    /**
     *
     * Users
     *
     */
    Route::group([
        'prefix' => 'users'
    ], function () {

        Route::get('/', \App\Livewire\Admin\User\Index::class)->name('admin.users.index');

    });

    Route::get('/profile', \App\Livewire\Admin\Profile::class)->name('admin.profile');

});
