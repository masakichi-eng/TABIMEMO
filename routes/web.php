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

Route::get('/items/top', 'ItemsController@showItems')->name('top');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'TopController@index')->name('tops.index');
Route::get('/articles/index', 'ArticleController@index')->name('articles.index');
Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);
Route::prefix('articles')->name('articles.')->group(function () {
    Route::put('/{article}/like', 'ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'ArticleController@unlike')->name('unlike')->middleware('auth');
});

Route::get('/tags/{name}', 'TagController@show')->name('tags.show');

Route::get('items/{item}', 'ItemsController@showItemDetail')->name('item');

Route::middleware('auth')
    ->group(function () {
        Route::get('sell', 'SellController@showSellForm')->name('sell');
        Route::post('sell', 'SellController@sellItem')->name('sell');
        Route::get('items/{item}/buy', 'ItemsController@showBuyItemForm')->name('item.buy');
        Route::post('items/{item}/buy', 'ItemsController@buyItem')->name('item.buy');
    });

Route::prefix('mypage')
    ->namespace('MyPage')
    ->group(function () {
        Route::get('/{name}/likes', 'ProfileController@likes')->name('mypage.likes');
        Route::middleware('auth')->group(function () {
            Route::get('edit-profile', 'ProfileController@showProfileEditForm')->name('mypage.edit-profile');
            Route::post('edit-profile', 'ProfileController@editProfile')->name('mypage.edit-profile');
            Route::get('sold-items', 'SoldItemsController@showSoldItems')->name('mypage.sold-items');
            Route::get('bought-items', 'BoughtItemsController@showBoughtItems')->name('mypage.bought-items');
            Route::get('/{name}', 'ProfileController@show')->name('mypage.show');
            Route::put('/{name}/follow', 'ProfileController@follow')->name('follow');
            Route::delete('/{name}/follow', 'ProfileController@unfollow')->name('unfollow');
            Route::get('/{name}/followings', 'ProfileController@followings')->name('mypage.followings');
            Route::get('/{name}/followers', 'ProfileController@followers')->name('mypage.followers');
        });
    });
