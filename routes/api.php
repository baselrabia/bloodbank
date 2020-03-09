<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=> 'v1', 'namespace' => 'Api'],function(){

    Route::get('governorates','MainController@governorates');
    Route::get('cities','MainController@cities');

    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login')->name('login');
    Route::post('reset-password','AuthController@resetPassword');
    Route::post('new-password','AuthController@newPassword');

    Route::group(['middleware'=> 'auth:api'],function(){

        Route::get('posts','MainController@posts');


        Route::get('profile','ProfileController@getProfile');
        Route::post('profile','ProfileController@updateProfile');

    });

});
