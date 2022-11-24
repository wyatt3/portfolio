<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['uses' => 'PostController@getIndex', 'as' => 'posts.index']);

Route::get('post/{id}', ['uses' => 'PostController@getPost', 'as' => 'posts.post']);

Route::get('about', function() {
    return view('other.about');
})->name('other.about');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {  //For multiple middlewares put 'auth' inside [] and add aliases inside array
    Route::get('', ['uses' => 'PostController@getAdminIndex', 'as' => 'admin.index']);

    Route::post('', ['uses' => 'PostController@postAdminIndex', 'as' => 'admin.index']);
    
    Route::get('create', ['uses' => 'PostController@getAdminCreate', 'as' => 'admin.create']);
    
    Route::post('create', ['uses' => 'PostController@postAdminCreate', 'as' => 'admin.create']);
    
    Route::get('edit/{id}', ['uses' => 'PostController@getAdminEdit', 'as' => 'admin.edit']);
    
    Route::post('edit', ['uses' => 'PostController@postAdminUpdate', 'as' => 'admin.update']);

    Route::get('delete/{id}', ['uses' => 'PostController@getAdminDelete', 'as' => 'admin.delete']);

    Route::get('close_account', ['uses' => 'PostController@getCloseAccount', 'as' => 'admin.close_account']);

    Route::post('close_account', ['uses' => 'PostController@postCloseAccount', 'as' => 'admin.close_account']);
});
Auth::routes();

Route::post('login', ['uses' => 'SigninController@signin', 'as' => 'auth.signin']);

Auth::routes();
