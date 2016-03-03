<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Dasboard
Route::get('admin', 'DashboardController@index');
Route::get('admin/settings/apps', 'SettingsController@apps');
Route::get('admin/settings/certificates', 'SettingsController@certificates');


Route::get('admin/settings/server/{$server}/edit', 'SettingsController@serverEdit');

//Device
Route::get('admin/device/', 'DeviceController@index');
Route::post('admin/device/add', 'DeviceController@add');

//Message
Route::get('admin/message/', 'MessageController@index');
Route::post('admin/message/add', 'MessageController@add');


//MessageQueue
Route::post('admin/message/send', 'MessageQueueController@proceedMessageQueue');

//Device
Route::get('admin/device/', 'DeviceController@index');
Route::post('admin/device/add', 'DeviceController@add');

//Server
Route::get('admin/settings/server', 'ServerController@index');
Route::post('admin/settings/server/add', 'ServerController@add');

//App
Route::get('admin/settings/app', 'AppController@index');
Route::post('admin/settings/app/add', 'AppController@add');

//Certificate
Route::get('admin/settings/certificate', 'certificateController@index');
Route::post('admin/settings/certificate/add', 'certificateController@add');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
