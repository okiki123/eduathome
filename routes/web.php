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

Route::get('/', function () {

    $customers = [
        asset('images/success_stories__person3.jpg'),
        asset('images/success_stories__person4.jpg'),
        asset('images/success_stories__person16.jpg')
    ];

    $caregivers = [
        asset('images/success_stories__person4.jpg'),
        asset('images/success_stories__person5.jpg'),
        asset('images/success_stories__person3.jpg')
    ];

    return view('welcome', [
        'customers' => $customers,
        'caregivers' => $caregivers
    ]);
});

Auth::routes(['verify' => true]);

require base_path('routes/admin.php');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::get('/profile/{id}', 'CareSupportTeacherController@profile')->name('dashboard.profile');

    Route::get('/settings', 'UserSettingsController@index')->name('dashboard.settings');

    Route::put('/basic-details', 'UserSettingsController@updateBasicDetails')->name('dashboard.update.basic-details');

    Route::put('/contact-details', 'UserSettingsController@updateContactDetails')->name('dashboard.update.contact-details');

    Route::put('/bio-resume', 'UserSettingsController@updateBioAndResume')->name('dashboard.update.bio-resume');

    Route::put('/password', 'UserSettingsController@updatePassword')->name('dashboard.update.password');
});
