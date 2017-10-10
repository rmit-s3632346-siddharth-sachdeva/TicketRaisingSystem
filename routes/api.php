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


    //Route::middleware('cors')->get('ticketCRUD', 'TicketCRUDController@fetch');

// Ticket List
    Route::get('ticketCRUD/list','TicketCRUDController@index');

// Ticket Show
    Route::get('ticketCRUD/{id}', 'TicketCRUDController@show');

// Ticket Store
    Route::post('ticketCRUD', 'TicketCRUDController@store');

// Ticket Update
    Route::post('ticketCRUD/{id}/update', 'TicketCRUDController@update');

// Ticket Delete
    Route::get('ticketCRUD/{id}/delete', 'TicketCRUDController@destroy');

// Comment List
    Route::get('commentCRUD/list','CommentCRUDController@index');

// Comment Show
    Route::get('commentCRUD/{id}', 'CommentCRUDController@show');

// Comment Store
    Route::post('commentCRUD', 'CommentCRUDController@store');

// Comment Update
    Route::post('commentCRUD/{id}/update', 'CommentCRUDController@update');

// Comment Delete
    Route::get('commentCRUD/{id}/delete', 'CommentCRUDController@destroy');

// Get comments by ticket id.
    Route::get('commentCRUD/{id}/comments', 'CommentCRUDController@getCommentsByTicketId');

});