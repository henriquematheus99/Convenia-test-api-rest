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
    Route::prefix('empresas')->group(function()
    {

        Route::get('/', 'EmpresaController@index')->name('all_empresas');
        Route::get('/{id}', 'EmpresaController@show')->name('single_empresas');

        Route::post('/', 'EmpresaController@store')->name('save_empresa');
        Route::put('/{id}', 'EmpresaController@update')->name('update_empresa');

        Route::delete('/{id}', 'EmpresaController@delete')->name('delete_empresa');

    });
});




