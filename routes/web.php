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

Route::get('/', function () {
    return redirect('/home');
});
Route::get("/admin/category/{id}/delete","Admin\CategoryController@destroy");
Route::get("/admin/category/{id}/status","Admin\CategoryController@status");
Route::resource("/admin/category","Admin\CategoryController");


Route::get("/admin/article/{id}/delete","Admin\ArticleController@destroy");
Route::get("/admin/article/{id}/status","Admin\ArticleController@status");
Route::get("/admin/article/{id}/allowcomment","Admin\ArticleController@allowcomment");
Route::resource("/admin/article","Admin\ArticleController");


Route::resource("/admin/admin","Admin\AdminController");
Route::get("/admin/admin/{id}/delete","Admin\AdminController@destroy");
Route::get("/admin/admin/{id}/permission","Admin\AdminController@permission");
Route::post("/admin/admin/{id}/setpermission","Admin\AdminController@setpermission");


Route::resource("/admin/slider","Admin\SliderController");
Route::get("/admin/slider/{id}/delete","Admin\SliderController@destroy");

Route::resource("/admin/comment","Admin\CommentController");
Route::get("/admin/comment/{id}/delete","Admin\CommentController@destroy");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\HomeController@index');
Route::get('/admin/home/noaccess', 'Admin\HomeController@noaccess');
Route::get('/home/articles', 'HomeController@articles');
Route::get('/home/article/{id}', 'HomeController@article');
Route::post('/home/article/{id}', 'HomeController@postcomment');
