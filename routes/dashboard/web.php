<?php

use App\Http\Controllers\Dashboard\DashboardController;




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


    });//end of dashboard routes
});