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

    $router->get('/guilds',                 'OverviewController@form');
    $router->post('/guilds',                'OverviewController@select');
    $router->get('/guilds/{world}',         'OverviewController@show')->where('world', '[A-Za-z\-]+');
    $router->get('/guilds/{world}/create',  'OverviewController@create')->where('world', '[A-Za-z\-]+');
    $router->post('/guilds/create',         'OverviewController@store');

    /*
    |--------------------------------------------------------------------------
    | Guild
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/guilds/{world}/{guild}', 'GuildController@show')->where('world', '[A-Za-z\-]+')->where('guild', '[A-Za-z\-]+');

});
