<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => ['guest:admin', 'guest']], function () {

        Route::get('/login', 'Admin\AdminAuthController@login')->name('admin.login');

        Route::post('/login', 'Admin\AdminAuthController@authenticate')->name('admin.authenticate');

    });

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::post('/logout', 'Admin\AdminAuthController@logout')->name('admin.logout');

        Route::get('/', 'Admin\AdminIndexController@index')->name('admin.index');

        Route::get('/care-support-teacher', 'Admin\AdminCareSupportTeacherController@index')->name('admin.care-support-teachers');

    });

});
