<?php
Route::get('/', 'AdminController')->name('dashboard');
Route::resource('posts', 'PostController');
Route::delete('/posts/{post}/thumbnail', 'PostController@destroy_thumbnail')->name('posts_thumbnail.destroy');

Route::resource('comments', 'CommentController')->only(['index', 'edit', 'update', 'destroy']);
Route::resource('media', 'MediaController')->only(['index', 'show', 'create', 'store', 'destroy']);

Route::resource('categories', 'CategoryController');
Route::resource('tags', 'TagController');


Route::resource('users', 'UserController');
Route::resource('permissions', 'PermissionController');
Route::resource('roles', 'RoleController');
