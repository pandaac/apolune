<?php

$router->group(['middleware' => 'web', 'namespace' => 'Apolune\Support\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | GenericController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */
   
    $router->get('/support/faq', 'GenericController@faq');
    $router->get('/support/tutor', 'GenericController@tutor');

    /*
    |--------------------------------------------------------------------------
    | LegalController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */
   
    $router->get('/support/legal', 'LegalController@index');
    $router->get('/support/privacy', 'LegalController@privacy');
    $router->get('/support/rules', 'LegalController@rules');
    $router->get('/support/terms', 'LegalController@terms');

});
