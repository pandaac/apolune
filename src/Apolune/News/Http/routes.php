<?php

$router->group(['namespace' => 'Apolune\News\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | Latest News
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/',                   'LatestController@overview');
    $router->get('/featured/{slug}',    'LatestController@show');

    /*
    |--------------------------------------------------------------------------
    | News Archive
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */
   
    $router->get('/archive',        'ArchiveController@form');
    $router->post('/archive',       'ArchiveController@results');
    $router->get('/archive/{slug}', 'ArchiveController@show');

});
