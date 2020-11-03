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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
