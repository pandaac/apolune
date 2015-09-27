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
    $router->get('/highscore/{slug}/{sort?}',   'HighscoreController@show')->where('slug', '[A-Za-z\-]+')->where('sort', '[A-Za-z]+');

});
