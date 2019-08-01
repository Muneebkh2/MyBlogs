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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'BlogController@index');
Route::get('/blog/show/{id}', 'BlogController@show');

//Route::group(['middleware' => ['web']],function(){
// Route::resource('post','BlogController');
// Route::POST('addPost','BlogController@addPost');
// Route::POST('editPost','BlogController@editPost');
// Route::POST('deletePost','BlogController@deletePost');
//});

// Auth::routes();
Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin','AdminController@index');
    Route::get('/admin/create/post','AdminController@create');
    Route::post('/admin/store/post','AdminController@store');
    Route::get('/admin/edit/post/{id}','AdminController@edit');
    Route::post('/admin/update/post/{id}','AdminController@update');
    Route::get('/admin/delete/post/{id}','AdminController@destroy');
    Route::get('/admin/settings/{id}','AdminController@showsettings');
    Route::post('/admin/settings/{id}','AdminController@settings');
});



