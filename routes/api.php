<?php

use App\Constants\Messages;
use App\Constants\StaticContents;
use App\Helpers\Utils;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/user', function (Request $request) {
////    return response()->json(State::getStates());
//
//    return response()->json(State::getCities($request->state_id));
//});

Route::get('/states', function (Request $request) {
    try {
        return response()->json(State::getStates());
    } catch (Exception $ex) {
        report($ex);
        return Utils::messageResponse('error', Messages::failedToGet(StaticContents::STATES), 500);
    }
});

Route::get('/cities', function (Request $request) {
    try {

        if (!$request->state_id) {
            return Utils::messageResponse('error', Messages::failedToGet(StaticContents::CITIES), 400);
        }

        return response()->json(State::getCities($request->state_id));

    } catch (Exception $ex) {
        report($ex);
        return Utils::messageResponse('error', Messages::failedToGet(StaticContents::CITIES), 500);
    }
});
