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

Route::get('/', 'IndexController@show');
Route::get('/about', 'IndexController@about');
Route::get('/policy', 'IndexController@policy');

Route::get('/stat/{coin}/{hours?}', 'CoinController@show')->middleware('auth')
                ->name('stat')->where(['coin'=> '[\w_]{7}', 'hours'=>'[\d]']);

Auth::routes();
// Social Auth
Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');
Route::get('/home', 'HomeController@index')->name('home');