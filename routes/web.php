<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'empreendimentos'], function () {

    Route::get('/{route}', function ($path_route){
        try {
            return view('hostsite')->with('path_route', $path_route);
        } catch (Exception $exception) {
            return response($exception)->status(500);
        }
    } );

});
