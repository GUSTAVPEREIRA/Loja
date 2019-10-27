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
    return view('welcome');
});

Route::prefix('register')->group(function () {
    //=======================================Category=======================================
    $controller = 'CategorieController';
   Route::get('category', "$controller@serasa");
   Route::get('category/add', "$controller@modal")->name('category.modal');
   Route::get('category/create', "$controller@store")->name('category.add');
   Route::get('category/show', "$controller@show")->name('category.show');

});

