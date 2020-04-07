<?php

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

Route::get('/','HomeController@index');

/**
 * Contact Form Routes
 */
Route::prefix('/contact')->group(function() {
    //appelle la méthode show() quand l'accès à l'url /contacts se fait avec la méthode get
    Route::get('/','ContactController@show');
    //appelle la méthode create() quand l'accèse à l'url /contacts se fait avec la méthode post
    Route::post('/','ContactController@create')->name('post-contact');
});

Route::get('/articles','HomeController@articles');

Route::get('/articles/{post_name}','PostController@show');



Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware'=>['auth']], function (){

    Route::get('/create', 'ArticlesController@create');
    Route::get('/user', 'DemoController@userDemo')->name('user');
    Route::get('nopermission', 'DemoController@permissionDenied')->name('nopermission');

    Route::post('/create', 'ArticlesController@save')->name('articles.store');
    Route::delete('/articles/{id}', 'ArticlesController@destroy')->name('articles.destroy');

    Route::group(['middleware'=>['admin']], function (){

        Route::put('/update/{id}', 'ArticlesController@update')->name('admin.update');
        Route::get('/edit/{id}', 'ArticlesController@edit')->name('admin.edit');
        Route::patch('/edit/{id}', 'ArticlesController@edit')->name('admin.edit');

        Route::get('/admin', 'DemoController@adminDemo')->name('admin');
    });
});
Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
