<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@getHomePage');
Route::get('home', [ 'as' => 'home', 'uses' => 'HomeController@getHomePage']);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('home', [ 'as' => 'home', 'uses' => 'HomeController@getHomePage']);
Route::get('faqs', [ 'as' => 'faqs', 'uses' => 'FAQController@getFAQPage']);
Route::resource('/viewTickets', 'ViewTicketsController');
Route::get('/raiseTicket',[ 'as' => 'raiseTicket', 'uses' => 'RaiseTicketController@raiseTicketCreate']);
Route::post('/raiseTicket',[ 'as' => 'raiseTicket_store', 'uses' => 'RaiseTicketController@raiseTicketStore']);
Route::patch('viewTickets', 'ViewTicketsController@search');

Auth::routes();



//Keep this rout in the end otherwise problem, as it reads in a sequence
Route::get('{all}', function () {
    return view('main.page_not_found');
});


