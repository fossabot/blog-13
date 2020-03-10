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

Route::get('/', 'HomeController@index')->name('home');
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes(['verify' => true]);
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');
Route::get('category/', 'CategoryController@index');
Route::get('category/{slug}', 'CategoryController@show');

