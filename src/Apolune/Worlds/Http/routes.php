<?php

$router->group(['middleware' => 'web', 'namespace' => 'Apolune\Worlds\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | Worlds
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */
   
    $router->get('/worlds', 'WorldsController@overview');
    $router->post('/worlds', 'WorldsController@select');
    $router->get('/worlds/{world}', 'WorldsController@show')->where('world', '[A-Za-z\-]+');

});
