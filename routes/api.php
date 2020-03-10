<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/user')->group(function () {
    Route::get('', 'UserController@show');
    Route::patch('', 'UserController@update');
    Route::patch('/password', 'UserController@updatePassword');
});


Route::prefix('/post')->group(function () {
    Route::get('', 'PostController@index');
    Route::get('{client}', 'PostController@show');
    Route::post('store', 'PostController@store');
    Route::patch('{client}', 'PostController@update');
    Route::post('destroy', 'PostController@destroyMass');
    Route::delete('{client}/destroy', 'PostController@destroy');
});
