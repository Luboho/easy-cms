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



Auth::routes();

Route::get('layouts/app', 'NavLogoController@getNavLogo')->name('nav');

Route::get('/logos/create', 'LogosController@create')->name('logos.create');
Route::post('/logos', 'LogosController@store')->name('logos.store');
Route::get('/logos/{logo}/edit', 'LogosController@edit')->name('logos.edit');
Route::patch('/logos/{logo}', 'LogosController@update')->name('logos.update');

Route::get('/', 'PostsController@index')->name('posts.show');
Route::get('/posts/create', 'PostsController@create')->name('posts.create');
Route::post('/posts', 'PostsController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
Route::patch('/posts/{post}', 'PostsController@update')->name('posts.update');
Route::delete('posts/{post}', 'PostsController@destroy')->name('posts.destroy');

Route::get('alacarte', 'AlacarteController@index')->name('alacarte.index');
Route::get('/alacarte/create', 'AlacarteController@create')->name('alacarte.create');
Route::post('alacarte', 'AlacarteController@store')->name('alacarte.store');
Route::get('/alacarte/{alacarte}', 'AlacarteController@show')->name('alacarte.show');
Route::get('/alacarte/{alacarte}/edit', 'AlacarteController@edit')->name('alacarte.edit');
Route::patch('/alacarte/{alacarte}', 'AlacarteController@update')->name('alacarte.update');
Route::delete('alacarte/{alacarte}', 'AlacarteController@destroy')->name('alacarte.destroy');

Route::get('contact', 'ContactFormController@index')->name('contact.index');
Route::get('contact/create', 'ContactFormController@create')->name('contact.create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');

Route::get('/contact/company/create', 'ContactCompanyController@create')->name('company.create');
Route::post('/contact/company', 'ContactCompanyController@store')->name('company.store');
Route::get('/contact/company/{company}/edit', 'ContactCompanyController@edit')->name('company.edit');
Route::patch('/contact/company/{company}', 'ContactCompanyController@update')->name('company.update');

Route::get('/rooms', 'RoomsController@index')->name('rooms.index');
Route::get('/rooms/create', 'RoomsController@create')->name('rooms.create');
Route::post('/rooms', 'RoomsController@store')->name('rooms.store');
Route::get('/rooms/{room}/edit', 'RoomsController@edit')->name('rooms.edit');
Route::patch('/rooms/{room}', 'RoomsController@update')->name('rooms.update');
Route::delete('/rooms/{room}', 'RoomsController@destroy')->name('rooms.destroy');

Route::get('/profiles', 'ProfilesController@index')->middleware('can:isHeadAdmin')->name('profiles.index');
Route::delete('/profiles/{user}', 'ProfilesController@destroy')->middleware('can:isHeadAdmin')->name('profile.destroy');

