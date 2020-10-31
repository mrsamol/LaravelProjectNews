<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin','namespace' => 'App\Http\Controllers'], function(){
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

	Route::get('/login','LoginController@loginForm')->name('login');
	Route::post('/login','LoginController@login')->name('loginto');
});
Route::group(['middleware' =>'auth'],function(){
	Route::group(['prefix' => 'dashboard','namespace' => 'App\Http\Controllers'], function(){
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

		Route::get('/','DashboardController@index')->name('dashboard.index');

	
		Route::get('/users','UserController@index')->name('dashboard.users.index');
		Route::get('/users/create','UserController@create')->name('dashboard.users.create');
		Route::post('/users/store','UserController@store')->name('dashboard.users.store');
		Route::get('/users/delete/{id}','UserController@destroy')->name('dashboard.users.delete');
		Route::get('/users/edit/{id}','UserController@edit')->name('dashboard.users.edit');
		Route::post('/users/update/{id}','UserController@update')->name('dashboard.users.update');
		Route::get('/users/show/{id}','UserController@show')->name('dashboard.users.show');
		Route::get('/users/profile/{id}','UserController@editProfile')->name('dashboard.users.profile');
		Route::post('/users/profile/{id}','UserController@updateProfile')->name('dashboard.users.profile.update');
		Route::get('/users/logout','UserController@logout')->name('dashboard.users.logout');


		// Route Category
		Route::get('/categories','CategoryController@index')->name('dashboard.category.index');
		Route::get('/categories/create','CategoryController@create')->name('dashboard.category.create');
		Route::post('/categories/store','CategoryController@store')->name('dashboard.category.store');
		Route::get('/categories/show/{id}','CategoryController@show')->name('dashboard.category.show');
		Route::get('/categories/edit/{id}','CategoryController@edit')->name('dashboard.category.edit');
		Route::post('/categories/update/{id}','CategoryController@update')->name('dashboard.category.update');
		Route::get('/categories/delete/{id}','CategoryController@destroy')->name('dashboard.category.delete');


		// Route Post

		Route::get('/posts','PostController@index')->name('dashboard.post.index');
		Route::get('/posts/create','PostController@create')->name('dashboard.post.create');
		Route::post('/posts/store','PostController@store')->name('dashboard.post.store');
		Route::get('/posts/show/{id}','PostController@show')->name('dashboard.post.show');
		Route::get('/posts/edit/{id}','PostController@edit')->name('dashboard.post.edit');
		Route::post('/posts/update/{id}','PostController@update')->name('dashboard.post.update');
		Route::get('/posts/delete/{id}','PostController@destroy')->name('dashboard.post.delete');


		// Route Site Info

		Route::get('/setting','SettingController@index')->name('dashboard.setting.index');
		Route::get('/setting/create','SettingController@create')->name('dashboard.setting.create');
		Route::post('/setting/store','SettingController@store')->name('dashboard.setting.store');
		Route::get('/setting/edit/{id}','SettingController@edit')->name('dashboard.setting.edit');
		Route::post('/setting/update/{id}','SettingController@update')->name('dashboard.setting.update');
		Route::get('/setting/delete/{id}','SettingController@destroy')->name('dashboard.setting.delete');


		// Route Slider
		Route::get('/sliders','SliderController@index')->name('dashboard.slider.index');
		Route::get('/sliders/create','SliderController@create')->name('dashboard.slider.create');
		Route::post('/sliders/store','SliderController@store')->name('dashboard.slider.store');
		Route::get('/sliders/edit/{id}','SliderController@edit')->name('dashboard.slider.edit');
		Route::post('/sliders/update/{id}','SliderController@update')->name('dashboard.slider.update');
		Route::get('/sliders/delete/{id}','SliderController@destroy')->name('dashboard.slider.delete');
	
	});
});

Route::group(['prefix' => '/','namespace' => 'App\Http\Controllers'], function(){
	Route::get('/','HomeController@home')->name('home');
	Route::get('/post/detail/{id}','HomeController@PostDetail')->name('post.detail');
	Route::get('/category/{id}','HomeController@getPostByCategory')->name('post.by.category');

});


