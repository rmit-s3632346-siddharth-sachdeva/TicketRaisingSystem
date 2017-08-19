<?php

Route::get('/', 'HomeController@getHomePage');
Route::get('home', [ 'as' => 'home', 'uses' => 'HomeController@getHomePage']);

Route::get('faqs', [ 'as' => 'faqs', 'uses' => 'FAQController@getFAQPage']);
/*Route::get('/trackTickets',  ['as'=>'trackTickets','uses'=>'TrackTicketsController@trackTickets']);
Route::get('/trackTickets', [ 'as' => 'trackTicketComment_store', 'uses' => 'TrackTicketsController@tractTicketCommentStore']);*/

/*Route::get('/viewTickets', ['as'=>'viewTickets','uses'=>'ViewTicketsController@viewTickets']);*/
Route::resource('/viewTickets', 'ViewTicketsController');


Route::get('/raiseTicket',[ 'as' => 'raiseTicket', 'uses' => 'RaiseTicketController@raiseTicketCreate']);
Route::post('/raiseTicket',[ 'as' => 'raiseTicket_store', 'uses' => 'RaiseTicketController@raiseTicketStore']);


Route::post('/setEditable', [ 'as' => 'setEditable', 'uses' => 'ViewTicketsController@setEditable']);



Route::post('/login', [ 'as' => 'login_store', 'uses' => 'LoginController@loginStore']);



//Keep this rout in the end otherwise problem, as it reads in a sequence
Route::get('{all}', function () {
    return view('main.page_not_found');
});
