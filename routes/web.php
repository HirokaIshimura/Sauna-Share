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
Route::get('/', 'PostsController@index');

// サインアップルーティング
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証ルーティング
Route::get('guestlogin', 'Auth\LoginController@showGuestLoginForm')->name('guestlogin');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// 認証つきのルーティング
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);

    Route::group(['prefix' => 'posts/{id}'], function () {
        Route::post('favorite', 'FavoritePostsController@store')->name('favorite.posts');
        Route::delete('unfavorite', 'FavoritePostsController@destroy')->name('unfavorite.posts');
    });
    
    Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    
    Route::get('search', 'SearchController@index');
    Route::get('search/form', 'SearchController@form')->name('search.form');
    Route::post('search', 'SearchController@index')->name('search.index');
    Route::post('search/form', 'SearchController@form');
});
