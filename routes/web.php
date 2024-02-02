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

    Route::get('/condominio-verde-serrano', function (){
        try {
            return view('condominio-verde-serrano.hotsite');
        } catch (Exception $exception) {
            return response($exception, 500);
        }
    } );

});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('/leads/{id}', [\App\Http\Controllers\LeadController::class, 'update'])
    ->name('leads.edit');

Route::delete('/leads/{id}', [\App\Http\Controllers\LeadController::class, 'destroy'])
    ->name('leads.destroy');
