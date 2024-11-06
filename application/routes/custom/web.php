<?php

/**----------------------------------------------------------------------------------------------------------------
 * [GROWCRM - CUSTOM ROUTES]
 * Place your custom routes or overides in this file. This file is not updated with Grow CRM updates
 * ---------------------------------------------------------------------------------------------------------------*/

    //For Admin Panel
    Route::group(['prefix' => 'app-admin'], function () {

        Route::get('auth/redirect', "Landlord\GoogleController@redirectToGoogle");
        Route::get('callback', "Landlord\GoogleController@handleGoogleCallback");
        Route::get('eventss', "Landlord\GoogleController@viewEvents");
        Route::post('events/create', "Landlord\GoogleController@createEvent");
        Route::post('events/{id}/delete', "Landlord\GoogleController@deleteEvent");
        Route::post('events/update', "Landlord\GoogleController@updateEvent");
        Route::get('/auth/logout', "Landlord\GoogleController@logout");
    });

        Route::get('auth/redirect', "GoogleController@redirectToGoogle");
        Route::get('callback', "GoogleController@handleGoogleCallback");
        Route::get('eventss', "GoogleController@viewEvents");
        Route::post('events/create', "GoogleController@createEvent");
        Route::post('events/{id}/delete', "GoogleController@deleteEvent");
        Route::post('events/update', 'GoogleController@updateEvent');
        Route::get('/auth/logout', 'GoogleController@logout');


    Route::group(['prefix' => 'ctickets'], function () {

        Route::get('index', "TicketController@index")->name('ctickets.index');
        Route::get('list', "TicketController@viewTickets")->name('list');
        Route::get('create', "TicketController@create");
        Route::get('{id}/edit', "TicketController@edit");
        Route::get('{id}/view', "TicketController@view");
        Route::post('store', "TicketController@store");
        Route::post('{id}/delete-ticket', "TicketController@destroyTicket");
        Route::post('{id}/update-details', "TicketController@updateTicketDetails");
        Route::post('/generate-link', 'TicketController@generateLink');
        Route::get('form', "TicketController@ticketForm");
        Route::post('{id}/convartToLead', 'TicketController@convartToLead');

    });


