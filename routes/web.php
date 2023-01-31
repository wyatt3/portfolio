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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Controller@getIndex')->name('home');
Route::post('/', 'Controller@postIndex')->name('contact');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', 'Controller@getAdminIndex')->name('admin.home');
    Route::post('profile-image', 'Controller@postAdminChangeProfileImage')->name('profile.image');
    Route::post('resume', 'Controller@postAdminChangeResume')->name('profile.resume');
    Route::group(['prefix' => 'mail'], function() {
        Route::get('/', 'Controller@getMailIndex')->name('mail.index');
        Route::get('delete/{id}', 'Controller@getDeleteMail')->name('mail.delete');
    });
    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', 'ProjectController@getIndex')->name('projects.index');
        Route::get('add', 'ProjectController@getAdd')->name('projects.add');
        Route::post('add', 'ProjectController@postStore')->name('projects.store');
        Route::post('edit', 'ProjectController@postUpdate')->name('projects.update');
        Route::get('edit/{id}', 'ProjectController@getEdit')->name('projects.edit');
        Route::get('delete/{id}', 'ProjectController@getDelete')->name('projects.delete');
        Route::get('{id}', 'ProjectController@getShow')->name('projects.show');
    });
});

