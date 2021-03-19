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

Auth::routes();

Route::group(['prefix' => 'ajax'], function () {
    // all routes that don't need to go to react-router
});

Route::prefix('api')->group(function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('instituciones', 'Api\InstitucionController')->parameters([
        'instituciones' => 'id'
    ]);

    Route::post('/login', 'Api\AuthController@login');
});

Route::get('/{path?}', function () {
    return view('layouts.app');
})->where('path', '.*'); //->where(['path' => '^(?!api).*$']);
