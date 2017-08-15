<?php

Route::get('/', 'HomeController@getHomePage');
Route::get('home', [ 'as' => 'home', 'uses' => 'HomeController@getHomePage']);
Route::get('faqs', [ 'as' => 'faqs', 'uses' => 'FAQController@getFAQPage']);
Route::get('/trackTickets', 'TrackTicketsController@trackTickets');
Route::get('/raiseTicket',[ 'as' => 'raiseTicket', 'uses' => 'RaiseTicketController@raiseTicketCreate']);
Route::post('/raiseTicket',[ 'as' => 'raiseTicket_store', 'uses' => 'RaiseTicketController@raiseTicketStore']);

