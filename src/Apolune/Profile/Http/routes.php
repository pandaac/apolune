<?php

$router->group(['middleware' => 'web', 'namespace' => 'Apolune\Profile\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */
   
    $router->get('/characters',     'SearchController@form');
    $router->post('/characters',    'SearchController@search');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/characters/{player}', 'ProfileController@show')->where('player', '[A-Za-z\-]+');

});
