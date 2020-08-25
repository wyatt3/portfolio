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
    Route::get('/', 'Controller@getAdminIndex')->name('admin.home');
    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', 'ProjectController@getIndex')->name('projects.index');
        Route::get('add', 'ProjectController@getAdd')->name('projects.add');
        Route::post('add', 'ProjectController@postStore')->name('projects.store');
        Route::post('edit', 'ProjectController@postUpdate')->name('projects.update');
        Route::get('edit/{id}', 'ProjectController@getEdit')->name('projects.edit');
        Route::get('delete/{id}', 'ProjectController@getDelete')->name('projects.delete');
        Route::get('{id}', 'ProjectController@getShow')->name('projects.show');
    });
    Route::group(['prefix' => 'updates'], function() {
        Route::get('/', 'BlogPostController@getIndex')->name('updates.index');
        Route::get('add', 'BlogPostController@getAdd')->name('updates.add');
        Route::post('add', 'BlogPostController@postStore')->name('updates.store');
        Route::post('edit', 'BlogPostController@postUpdate')->name('updates.update');
        Route::get('edit/{id}', 'BlogPostController@getEdit')->name('updates.edit');
        Route::get('delete/{id}', 'BlogPostController@getDelete')->name('updates.delete');
        Route::get('{id}', 'BlogPostController@getShow')->name('updates.show');
    });
});

