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
use App\Post;
use App\Models\Product;

Route::get('/', function () {
    return view('top');
});

Route::get('/mapping', function () {
    Product::createIndex($shards = null, $replicas = null);
    Product::putMapping($ignoreConflicts = true);
    Product::addAllToIndex();

    return view('welcome');
});


Route::resource('users', 'UserController');
#Route::group(['middleware' => ['auth', 'can:posts.edit']], function () {
Route::resource('posts', 'PostController')->middleware('can:posts.edit,post');
#});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'CatalogController@search');
Route::get('/nav/{category}', 'CatalogController@index');
Route::get('/{product}', 'CatalogController@show');
