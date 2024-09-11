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
