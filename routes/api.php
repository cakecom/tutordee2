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
Route::get('subject', 'Api\SubjectController@getSubject');
Route::get('group', 'Api\GroupController@getGroup');
Route::get('amphure', 'Api\AmphureController@getAmphure');
Route::get('province', 'Api\ProvinceController@getProvince');
