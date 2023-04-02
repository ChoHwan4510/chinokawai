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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'project'], function(){
    Route::get('/animeQuiz','ProjectController@animeQuiz')->name('projectAnimeQuiz');

    //애니메이션 체크
    Route::group(['prefix' => 'checkAni'], function(){
        Route::get('/list','ProjectController@myAnimationCheck')->name('myAnimationCheck');
        Route::get('/insert', 'ProjectController@insertMyAnimation')->name('inserMyAnimationCheck');
        Route::get('/search', 'ProjectController@animationSiteCheckController')->name('searchAniCheck');
    });
});
