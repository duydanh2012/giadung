<?php

Route::group(['namespace' => 'Platform\Dashboard\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::get('', [
            'as'         => 'dashboard.index',
            'uses'       => 'DashboardController@getDashboard',
            'permission' => false,
        ]);

        Route::group(['prefix' => 'widgets', 'permission' => false], function () {
            Route::get('hide', [
                'as'   => 'dashboard.hide_widget',
                'uses' => 'DashboardController@getHideWidget',
                'ziggy' => true,
            ]);

            Route::post('hides', [
                'as'   => 'dashboard.hide_widgets',
                'uses' => 'DashboardController@postHideWidgets',
                'ziggy' => true,
            ]);

            Route::post('order', [
                'as'    => 'dashboard.update_widget_order',
                'uses'  => 'DashboardController@postUpdateWidgetOrder',
                'ziggy' => true,
            ]);

            Route::post('setting-item', [
                'as'   => 'dashboard.edit_widget_setting_item',
                'uses' => 'DashboardController@postEditWidgetSettingItem',
                'ziggy' => true,
            ]);
        });
    });
});
