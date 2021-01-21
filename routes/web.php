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

Route::get('/', 'App\HomeController@index')->name('home');

Route::get('/about-us', 'App\HomeController@about')->name('about');

Route::group(['prefix' => 'care-support-teachers'], function () {

    Route::get('/', 'App\CareSupportTeacherController@index')->name('care-support-teachers.index');

    Route::get('/{id}', 'App\CareSupportTeacherController@profile')->name('care-support-teachers.show');

});

Auth::routes(['verify' => true]);

require base_path('routes/admin.php');

Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/profile/{id}', 'App\CareSupportTeacherController@profile')->name('dashboard.profile');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', 'CareSupportTeacher\DashboardController@index')->name('dashboard.index');

        Route::put('/basic-details', 'CareSupportTeacher\SettingsController@updateBasicDetails')->name('dashboard.update.basic-details');

        Route::put('/contact-details', 'CareSupportTeacher\SettingsController@updateContactDetails')->name('dashboard.update.contact-details');

        Route::put('/bio-resume', 'CareSupportTeacher\SettingsController@updateBioAndResume')->name('dashboard.update.bio-resume');

        Route::put('/password', 'CareSupportTeacher\SettingsController@updatePassword')->name('dashboard.update.password');

        Route::group(['prefix' => 'settings'], function () {

            Route::get('/profile', 'CareSupportTeacher\SettingsController@index')->name('dashboard.settings.profile');

            Route::get('/account', 'CareSupportTeacher\SettingsController@account')->name('dashboard.settings.account');

        });

    });
});
