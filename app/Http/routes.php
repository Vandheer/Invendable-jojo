<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', ['as'   => 'home','uses' => 'HomeController@index']);

Route::get('inscription', ['as'   => 'auth.register','uses' => 'Auth\AuthController@getRegister']);
Route::post('inscription', ['as'   => 'auth.register','uses' => 'Auth\AuthController@postRegister']);
Route::get('inscription/succcess', ['as'   => 'auth.register.success','uses' => 'Auth\AuthController@getRegisterSuccess']);
Route::get('connexion', ['as'   => 'auth.login','uses' => 'Auth\AuthController@getLogin']);
Route::post('connexion', ['as'   => 'auth.login','uses' => 'Auth\AuthController@postLogin']);
Route::get('deconnexion', ['as'   => 'auth.logout','uses' => 'Auth\AuthController@getLogout']);

Route::get('ajax/city', ['as'   => 'ajax.city','uses' => 'City\CityController@getAjaxCity']);
Route::post('ajax/city', ['as'   => 'ajax.city','uses' => 'City\CityController@getAjaxCity']);

Route::get('deposer-une-annonce', ['as'   => 'advertisement.add', 'uses' => 'Advertisement\AdvertisementController@index']);
Route::post('deposer-une-annonce', ['as'   => 'advertisement.add', 'uses' => 'Advertisement\AdvertisementController@addAdvertisementInvite']);
Route::get('validation-annonce', ['as'   => 'advertisement.invite.validation', 'uses' => 'Advertisement\AdvertisementController@validationAdvertisementInvite']);
Route::post('validation-annonce', ['as'   => 'advertisement.invite.validation', 'uses' => 'Advertisement\AdvertisementController@PostAdvertisementInvite']);
Route::get('succes-annonce', ['as'   => 'advertisement.invite.success', 'uses' => 'Advertisement\AdvertisementController@getInviteSuccess']);

Route::get('offres/{region}', ['as'   => 'advertisement.offerList', 'uses' => 'Advertisement\AdvertisementController@index']);
Route::get('demandes/{region}', [ 'as'   => 'advertisement.askList', 'uses' => 'Advertisement\AdvertisementController@index']);
Route::get('aide', ['as'   => 'help.index','uses' => 'Help\HelpController@aide']);
