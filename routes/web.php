<?php

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

Route::get('/', 'Controller@getIndex')->name('home');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('home', 'Controller@getAdminIndex')->name('admin.home');
    Route::group(['prefix' => 'updates'], function() {
        Route::get('/', 'BlogPostController@getIndex')->name('updates.index');
        Route::post('edit', 'BlogPostController@')->name('updates.update');
        Route::get('edit/{id}', 'BlogPostController@')->name('updates.edit');
        Route::get('delete/{id}', 'BlogPostController@')->name('updates.delete');
        Route::get('{id}', 'BlogPostController@')->name('updates.show');
    });
});

