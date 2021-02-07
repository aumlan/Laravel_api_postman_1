<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Country;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/country', [Country\countryController::class, 'country']);
Route::get('/country/{id}', [Country\countryController::class, 'countryByID']);

Route::post('/country', [Country\countryController::class, 'countrySave']);

Route::put('/country/{id}', [Country\countryController::class, 'countryUpdate']);

Route::delete('/country/{id}', [Country\countryController::class, 'countryDelete']);*/

//Resource Controller Route
//Token Authentication
//Basic Authentication
Route::apiResource('/country', Country\countryControllerResource::class);

//Passport route
/*Route::group(['middleware' => ['auth:api']], function () {
    Route::apiResource('/country', Country\countryControllerResource::class);
});*/