<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('home', function () {
//     return 'Hawraa Arkan Home';
// });


// Route::view('hawraa', 'index');


// Route::get('Arkan', 'HawraaController@index');

// Route::get('users/{id}', 'HawraaController@show');
// Route::get('sum/{id}', 'HawraaController@sum');
// Route::get('Najaf', 'NajafController@index');
// Route::get('Najaf/{id}', 'NajafController@show');
// Route::get('NajafBlade', 'NajafBladeController@index');
// Route::get('NajafBlade/{id}', 'NajafBladeController@show');


// create/read/update/delete for product
// Route::resource('products', 'ProductController');
// Route::get('product/soft/delete/{id}', 'ProductController@softDelete')->name('soft.delete');
// Route::get('product/trash', 'ProductController@trashedProductes')->name('product.trash');
// Route::get('product/back/from/trash/{id}', 'ProductController@backFromSoftDelete')->name('product.back.from.trash');
// Route::get('product/delete/database/{id}', 'ProductController@deleteForEver')->name('product.delete.from.database');

Auth::routes();
Route::get('/home','HomeController@index')->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile/update', 'ProfileController@update')->name('profile.update');


// Routes for Posts
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/trashed', 'PostController@postsTrashed')->name('posts.trashed');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/show/{slug}', 'PostController@show')->name('post.show');
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
Route::get('/post/destroy/{id}', 'PostController@destroy')->name('post.destroy');
Route::get('/post/hdelete/{id}', 'PostController@hdelete')->name('post.hdelete');
Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
