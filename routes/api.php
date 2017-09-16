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

Route::group(['middleware' => 'cors'], function () {

// List
    Route::get('ticketCRUD/list','TicketCRUDController@index');

// Show
    Route::get('ticketCRUD/{id}', 'TicketCRUDController@show');

// Store
    Route::post('ticketCRUD', 'TicketCRUDController@store');

// Update
    Route::post('ticketCRUD/{id}/update', 'TicketCRUDController@update');

// Delete
    Route::get('ticketCRUD/{id}/delete', 'TicketCRUDController@destroy');

});