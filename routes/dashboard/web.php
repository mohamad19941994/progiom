<?php

use App\Http\Controllers\Dashboard\DashboardController;


Route::post('/post/image/upload', 'TinyController@uploadImage')->name('post.image.upload');

Route::post('dynamic-field/insert', 'MatchController@store')->name('dynamic-field.insert');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
function()
{
    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        Route::get('/index', 'DashboardController@index')->name('index');
        Route::get('/show', 'DashboardController@show')->name('show');
        //users route
        Route::resource('users', 'UserController');
        //categories route
        Route::resource('categories', 'CategoryController');
        //matches route
        Route::resource('matches', 'MatchController');
        //settings routes
        Route::resource('settings', 'SettingController');

        /*Route::get('pages/policy', 'PageController@index')->name('pages.policy');
        Route::post('pages/policy', 'PageController@update')->name('pages.update');
        Route::get('pages/term', 'PageController@show')->name('pages.term');*/


        Route::get('pages/policy', 'PageController@index')->name('pages.policy');
        Route::get('pages/term', 'PageController@create')->name('pages.term');
        Route::post('pages/store', 'PageController@store')->name('pages.store');
        Route::post('pages/update', 'PageController@update')->name('pages.update');


    });//end of dashboard routes
});