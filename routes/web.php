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
/* Route::group(['middleware' =>['web']], function () { */
    
    
    
    /* new made routes */
    Route::get('/', 'PagesController@getIndex');
    Route::get('/main', 'PagesController@getHome')-> name('main');
    Route::get('/articles', 'PagesController@getArticles')-> name('articles');
    

  

    /* make all articlecontroler routes working */
    Route::resource('articles','ArticleController');
 

    /* Route::get('/articles', 'ArticleController@index')-> name('articles.index');
    Route::get('/articles/create', 'ArticleController@create')-> name('articles.create');
    Route::post('/articles/store', 'ArticleController@store')-> name('articles.store');
    Route::get('/articles/{id}', 'ArticleController@show')-> name('articles.show');
    Route::post('/articles/{id}/edit', 'ArticleController@edit')-> name('articles.edit');
    Route::put('/articles/{id}/update', 'ArticleController@update')-> name('articles.update');
    Route::post('/articles/{id}/destroy', 'ArticleController@destroy')-> name('articles.destroy');
 */



   
/* }); */

/* was here from beginning */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


