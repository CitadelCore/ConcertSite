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

Route::get('/', function (){
    return view('welcome');
});

Route::get('/dev', function() {
  return view('pagebase', array("title" => "Hello World!"));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/store/buy', function (Request $request) {
    // buy item
});
