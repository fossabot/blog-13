<?php

//Route::get('dashboard', 'ShowDashboard')->name('dashboard');
Route::resource('posts', 'PostController');
Route::resource('users', 'UserController')->only(['index', 'edit', 'update']);
Route::resource('comments', 'CommentController')->only(['index', 'edit', 'update', 'destroy']);
//Route::resource('media', 'MediaLibraryController');


Route::get('/', 'AdminController')->name('dashboard');

Route::resource('categories', 'CategoryController');
Route::resource('tags', 'TagController');


Route::resource('users', 'UserController');
Route::resource('permissions', 'PermissionController');
Route::resource('roles', 'RoleController');


//Route::get('/home', 'HomeController@index')->name('home');

/*
 * Clients management
 * */
Route::prefix('/clients')->group(function () {
    Route::get('', 'ClientsController@index');
    Route::get('{client}', 'ClientsController@show');
    Route::post('store', 'ClientsController@store');
    Route::patch('{client}', 'ClientsController@update');
    Route::post('destroy', 'ClientsController@destroyMass');
    Route::delete('{client}/destroy', 'ClientsController@destroy');
});

/*
 * Current user
 * */
Route::prefix('/user')->group(function () {
    Route::get('', 'CurrentUserController@show');
    Route::patch('', 'CurrentUserController@update');
    Route::patch('/password', 'CurrentUserController@updatePassword');
});

/*
 * File upload (e.g. avatar)
 * */
Route::post('/files/store', 'FilesController@store');
