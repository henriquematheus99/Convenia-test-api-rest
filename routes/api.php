<?php

use Illuminate\Http\Request;

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

Route::namespace('API')->name('api.')->group(function()
{
    Route::prefix('companies')->group(function()
    {

        Route::get('/', 'CompanyController@index')->name('all_companies');
        Route::get('/{id}', 'CompanyController@show')->name('single_companies');

        Route::post('/', 'CompanyController@store')->name('save_companies');
        Route::put('/{id}', 'CompanyController@update')->name('update_companies');

        Route::delete('/{id}', 'CompanyController@delete')->name('delete_companies');

    });
});




