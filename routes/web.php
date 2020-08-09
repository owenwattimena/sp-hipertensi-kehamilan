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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/diagnosa', 'DiagnosaController@index')->name('diagnosa');
Route::post('/diagnosa', 'DiagnosaController@diagnosa')->name('diagnosa');

/**
 * ------------------------------------------------------------------------
 * Login Route
 * ------------------------------------------------------------------------
 * 
 */
Route::group(['middleware' => ['guest']], function () { 
    Route::get('/login', 'Auth\LoginController@index');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});
/**--------------------------------------------------------------------- */


/**
 * ------------------------------------------------------------------------
 * Admin Route
 * ------------------------------------------------------------------------
 * 
 */
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
        
        Route::group(['prefix' => 'gejala'], function () { 
            Route::get('/', 'Admin\GejalaController@index')->name('gejala');
            Route::post('/', 'Admin\GejalaController@store')->name('gejala_store');
            Route::put('/update/{id}', 'Admin\GejalaController@update');
            Route::delete('/delete/{id}', 'Admin\GejalaController@delete')->name('gejala_delete');
        });
        
        Route::group(['prefix' => 'penyakit'], function () { 
            Route::get('/', 'Admin\PenyakitController@index')->name('penyakit');
            Route::post('/', 'Admin\PenyakitController@store')->name('penyakit_store');
            Route::put('/update/{id}', 'Admin\PenyakitController@update');
            Route::delete('/delete/{id}', 'Admin\PenyakitController@delete')->name('penyakit_delete');
        });
        
        Route::group(['prefix' => 'rule'], function () {
            Route::get('/', 'Admin\RuleController@index')->name('rule');
            Route::post('/', 'Admin\RuleController@store')->name('rule_store');
            
            Route::put('/update/{id}', 'Admin\RuleController@update');
            Route::delete('/delete/{id}', 'Admin\RuleController@delete')->name('rule_delete');
        });

    });
});
/**--------------------------------------------------------------------- */