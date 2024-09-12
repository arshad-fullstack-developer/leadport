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
    });

    Route::get('auth/redirect', "GoogleController@redirectToGoogle");
    Route::get('callback', "GoogleController@handleGoogleCallback");
    Route::get('eventss', "GoogleController@viewEvents");
    Route::post('events/create', "GoogleController@createEvent");
    Route::post('events/{id}/delete', "GoogleController@deleteEvent");


    Route::group(['prefix' => 'ctickets'], function () {

        Route::get('index', "TicketController@index");
        Route::post('create', "TicketController@store");
        Route::get('{id}/edit', "TicketController@edit");

    });