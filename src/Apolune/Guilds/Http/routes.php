<?php

$multipleWorlds = worlds()->count() > 1;

$router->group(['namespace' => 'Apolune\Guilds\Http\Controllers'], function ($router) use ($multipleWorlds) {

    /*
    |--------------------------------------------------------------------------
    | Overview
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    if ($multipleWorlds) {
        $router->get('/guilds',                     'OverviewController@form');
        $router->post('/guilds',                    'OverviewController@select');
        $router->get('/guilds/{world}',             'OverviewController@show')->where('world', '[A-Za-z\-]+');
    } else {
        $router->get('/guilds',                     'OverviewController@show');
    }

    /*
    |--------------------------------------------------------------------------
    | Guild
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    if ($multipleWorlds) {
        $router->get('/guilds/{world}/{guild}',     'GuildController@show')->where('world', '[A-Za-z\-]+')->where('guild', '[A-Za-z\-]+');
    } else {
        $router->get('/guilds/{guild}',             'GuildController@show')->where('guild', '[A-Za-z\-]+');
    }

});
