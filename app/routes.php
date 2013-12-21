<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'guest'), function()
{
    Route::get('/', array('as' => 'kasir', 'uses' => 'SiteController@getKasir'));
    Route::get('/login', array('as' => 'login', 'uses' => 'SiteController@getLogin'));
    Route::post('/login', 'SiteController@postLogin');
    //Route::get('/', array('as' => 'login', 'uses' => 'SiteController@getLogin'));
    //Route::post('/login', 'SiteController@postLogin');

    Route::post('/register', array('as' => 'register', 'uses' => 'SiteController@postRegister'));

   /* Route::get("/forgot-password", array( "as" => "getPasswordReminder", "uses" => "SiteController@getPasswordReminder"));
    Route::post("/forgot-password", array( "as" => "postPasswordReminder", "uses" => "SiteController@postPasswordReminder"));
    Route::get("/reset-password/{token}", array( "as" => "getPasswordReset", "uses" => "SiteController@getPasswordReset"));
    Route::post("/reset-password", array( "as" => "postPasswordReset", "uses" => "SiteController@postPasswordReset"));*/
});

Route::group(array('before' => 'auth'), function()
{
    Route::get('/obat', array('as' => 'obat', 'uses' => 'ObatController@getObat'));

    Route::get('/logout', array('as' => 'logout', 'uses' => 'SiteController@getLogout'));

    Route::get('/pembelian', array('as' => 'penjualan', 'uses' =>'ObatController@getPenjualan'));

    Route::post('/detailObat', array('as' => 'detailObat', 'uses' => 'ObatController@getDetailobat'));


    Route::get('/home', array('as' => 'home', 'uses' => 'SiteController@getDahsboard'));

});