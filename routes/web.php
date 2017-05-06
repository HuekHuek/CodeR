<?php

use App\Events\MessagePosted;

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

Auth::routes();

Route::group(['prefix' => 'home'], function() {
    Route::get('/', 'HomeController@index')->middleware('auth');    
});

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('home', 'HomeController@index');
});

Route::get('/messages', function() {
    return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function() {
    $user = Auth::user();

    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);

    broadcast(new MessagePosted($message, $user))->toOthers();

    return ['status' => 'OK'];
})->middleware('auth');
