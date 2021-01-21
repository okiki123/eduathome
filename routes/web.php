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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/about-us', 'HomeController@about')->name('about');

Route::group(['prefix' => 'care-support-teachers'], function () {

    Route::get('/', 'CareSupportTeacherController@index')->name('care-support-teachers.index');

    Route::get('/{id}', 'CareSupportTeacherController@profile')->name('care-support-teachers.show');

});

Auth::routes(['verify' => true]);

require base_path('routes/admin.php');

Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/profile/{id}', 'CareSupportTeacherController@profile')->name('dashboard.profile');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', 'DashboardController@index')->name('dashboard.index');

        Route::get('/settings', 'UserSettingsController@index')->name('dashboard.settings');

        Route::put('/basic-details', 'UserSettingsController@updateBasicDetails')->name('dashboard.update.basic-details');

        Route::put('/contact-details', 'UserSettingsController@updateContactDetails')->name('dashboard.update.contact-details');

        Route::put('/bio-resume', 'UserSettingsController@updateBioAndResume')->name('dashboard.update.bio-resume');

        Route::put('/password', 'UserSettingsController@updatePassword')->name('dashboard.update.password');

    });
});
