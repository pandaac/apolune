<?php

$router->group(['middleware' => 'web', 'namespace' => 'Apolune\About\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | Server Information
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */
   
    $router->get('/about/server', 'AboutController@server');
    $router->get('/about/features', 'AboutController@features');
    $router->get('/about/premium', 'AboutController@premium');

    /*
    |--------------------------------------------------------------------------
    | Gallery
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */
   
    $router->get('/about/screenshots', 'ScreenshotController@index');

});
