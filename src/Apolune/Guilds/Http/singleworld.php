<?php

$router->group(['namespace' => 'Apolune\Guilds\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | Overview
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/guilds',         'OverviewController@show');
    $router->get('/guilds/create',  'OverviewController@create');
    $router->post('/guilds/create', 'OverviewController@store');

    /*
    |--------------------------------------------------------------------------
    | Guild
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/guilds/{guild}', 'GuildController@show')->where('guild', '[A-Za-z\-]+');

});
