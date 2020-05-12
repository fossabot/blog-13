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

Route::get('/manifest.json', 'ManifestController@manifestJson');
Route::get('/offline', 'ManifestController@offline');

Route::get('rss', 'BlogController@rss');
Route::get('sitemap.xml', 'BlogController@siteMap');
Route::get('feed', 'PostFeedController@index');
//static pages
Route::get('contact', 'ContactUsController@contactUs');
Route::post('contact', 'ContactUsController@store');
Route::get('/privacy', 'PageController')->defaults('post', 'privacy-and-policy');
Route::get('/about', 'PageController')->defaults('post', 'about-me');


//Route::get('posts', 'PostController@show');
//Route::get('users', 'UserController@show');

Route::get('/', 'BlogController@index');
Route::get('blog/{post}', 'BlogController@show');
Route::get('category/{category}', 'CategoryController');



Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');

Route::redirect('/.well-known/change-password', '/settings/password');

Auth::routes(['verify' => true]);

Route::prefix('auth')->group(function () {
    Route::get('{provider}', 'Auth\AuthController@redirectToProvider')->name('auth.provider');
    Route::get('{provider}/callback', 'Auth\AuthController@handleProviderCallback');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('settings')->group(function () {
        Route::get('account', 'UserController@edit')->name('users.edit');
//        Route::match(['put', 'patch'], 'account', 'UserController@update')->name('users.update');

//        Route::get('password', 'UserPasswordController@edit')->name('users.password');
//        Route::match(['put', 'patch'], 'password', 'UserPasswordController@update')->name('users.password.update');

//        Route::get('token', 'UserTokenController@edit')->name('users.token');
//        Route::match(['put', 'patch'], 'token', 'UserTokenController@update')->name('users.token.update');
    });

    Route::resource('newsletter-subscriptions', 'NewsletterSubscriptionController')->only('store');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
