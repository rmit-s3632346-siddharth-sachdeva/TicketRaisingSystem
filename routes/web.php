<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@getHomePage');
Route::get('home', [ 'as' => 'home', 'uses' => 'HomeController@getHomePage']);
/*Route::get('/', [ 'as' => '/', 'uses' => 'HomeController@getHomePage']);*/
/*Route::get('/', 'HomeController@index');*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('home', [ 'as' => 'home', 'uses' => 'HomeController@getHomePage']);
Route::get('faqs', [ 'as' => 'faqs', 'uses' => 'FAQController@getFAQPage']);
Route::resource('/viewTickets', 'ViewTicketsController');
Route::get('/raiseTicket',[ 'as' => 'raiseTicket', 'uses' => 'RaiseTicketController@raiseTicketCreate']);
Route::post('/raiseTicket',[ 'as' => 'raiseTicket_store', 'uses' => 'RaiseTicketController@raiseTicketStore']);
/*Route::post('/login', [ 'as' => 'login_store', 'uses' => 'LoginController@loginStore']);*/
/*Route::post('/viewTickets', [ 'as' => 'viewTickets.search', 'uses' => 'ViewTicketsController@search']);*/
Route::patch('viewTickets', 'ViewTicketsController@search');

Auth::routes();



//Keep this rout in the end otherwise problem, as it reads in a sequence
Route::get('{all}', function () {
    return view('main.page_not_found');
});


