<?php

/*
|--------------------------------------------------------------------------
| Blog Site Web Routes
|--------------------------------------------------------------------------
|
*/


//Fontend View Routes
Route::get('/', 'HomeController@index')->name('home');

//Post Route
Route::get('post/{slug}', 'PostController@details')->name('post.details');

Route::get('posts', 'PostController@index')->name('post.index');


Auth::routes();

Route::post('subscriber','SubscriberController@store')->name('subscriber.store');

//Favorite Route
Route::group(['middleware'=>['auth']], function(){
	Route::post('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
});


// Admin Route
Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function (){

	//Dashboard Route
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	//Settings Route
	Route::get('settings', 'SettingsController@index')->name('settings');
	Route::put('profile-update', 'SettingsController@updateProfile')->name('profile.update');
	Route::put('password-update', 'SettingsController@updatePassword')->name('password.update');

	//Resource Route
	Route::resource('tag', 'TagController');
	Route::resource('category', 'CategoryController');
	Route::resource('post', 'PostController');

	//Post Approved Route
	Route::get('pending/post','PostController@pending')->name('post.pending');
	Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');

	//Subscriber Route
	Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
	Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');

	//Favorite Route
	Route::get('/favorite','FavoriteController@index')->name('favorite.index');



});


// Author Route
Route::group(['as'=>'author.','prefix'=>'author', 'namespace'=>'Author', 'middleware'=>['auth','author']], function (){

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	//Settings Route
	Route::get('settings', 'SettingsController@index')->name('settings');
	Route::put('profile-update', 'SettingsController@updateProfile')->name('profile.update');
	Route::put('password-update', 'SettingsController@updatePassword')->name('password.update');


	//Resource Controller
	Route::resource('post', 'PostController');
	
	//Favorite Route
	Route::get('/favorite','FavoriteController@index')->name('favorite.index');

});

