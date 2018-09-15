<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::get('user/area/{area}', 'User\AreaController@store')->name('user.area.store');

// group
Route::group(['prefix' => '/{area}'], function () {
    /**
     * Category
     */
    Route::group(['prefix' => '/category'], function () {
        Route::get('/', 'Category\CategoryController@index')->name('category.index');

        Route::group(['prefix' => '/{category}'], function () {
            Route::get('listings', 'Listing\ListingController@index')->name('category.listings.index');
        });
    });

    /**
     * Listings
     */
    
    Route::get('/{listing}', 'Listing\ListingController@show')->name('listings.show');
});