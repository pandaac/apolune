<?php

$router->group(['namespace' => 'Apolune\Support\Http\Controllers'], function () {

    /*
    |--------------------------------------------------------------------------
    | GenericController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */
   
    get('/support/faq', 'GenericController@faq');
    get('/support/tutor', 'GenericController@tutor');

    /*
    |--------------------------------------------------------------------------
    | LegalController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */
   
    get('/support/legal', 'LegalController@index');
    get('/support/privacy', 'LegalController@privacy');
    get('/support/rules', 'LegalController@rules');
    get('/support/terms', 'LegalController@terms');

});
