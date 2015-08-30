<?php

$router->group(['namespace' => 'Apolune\Highscore\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | Highscore
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */
   
    $router->get('/highscore',                  'HighscoreController@form');
    $router->post('/highscore',                 'HighscoreController@select');
    $router->get('/highscore/{world}/{sort?}',  'HighscoreController@show')->where('world', '[A-Za-z\-]+')->where('sort', '[A-Za-z]+');

});
