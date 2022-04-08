<?php

Route::group(['namespace' => 'Platform\Products\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::resource('', 'ProductsController')->parameters(['' => 'products']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ProductsController@deletes',
                'permission' => 'products.destroy',
            ]);
        });
    });

});
