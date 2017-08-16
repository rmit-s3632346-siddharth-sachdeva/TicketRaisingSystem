<?php

Route::get('/', 'HomeController@getHomePage');
Route::get('home', [ 'as' => 'home', 'uses' => 'HomeController@getHomePage']);
Route::get('faqs', [ 'as' => 'faqs', 'uses' => 'FAQController@getFAQPage']);

Route::get('/trackTickets',  ['as'=>'trackTickets','uses'=>'TrackTicketsController@trackTickets']);
Route::get('/trackTickets', [ 'as' => 'trackTicketComment_store', 'uses' => 'TrackTicketsController@tractTicketCommentStore']);

Route::get('/viewTickets', ['as'=>'viewTickets','uses'=>'ViewTicketsController@viewTickets']);
Route::get('/viewTicketsAdmin', ['as'=>'viewTicketsAdmin','uses'=> 'ViewTicketsController@viewTicketsAdmin']);
Route::get('/raiseTicket',[ 'as' => 'raiseTicket', 'uses' => 'RaiseTicketController@raiseTicketCreate']);
Route::post('/raiseTicket',[ 'as' => 'raiseTicket_store', 'uses' => 'RaiseTicketController@raiseTicketStore']);

