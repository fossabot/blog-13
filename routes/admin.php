<?php

Route::get('/', 'AdminController')->name('dashboard');
Route::resource('posts', 'PostController')->except('show');
Route::resource('pages', 'PageController')->except('show');
Route::resource('users', 'UserController')->only(['index', 'edit', 'update']);
Route::resource('comments', 'CommentController')->only(['index', 'edit', 'update', 'destroy']);
Route::resource('categories', 'CategoryController');
Route::resource('tags', 'TagController');
Route::resource('users', 'UserController');
Route::resource('permissions', 'PermissionController');
Route::resource('roles', 'RoleController');
