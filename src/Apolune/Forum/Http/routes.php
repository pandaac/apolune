<?php

$router->group(['middleware' => 'web', 'namespace' => 'Apolune\Forum\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | World Boards
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/forum/world', 'WorldBoardsController@overview');

    /*
    |--------------------------------------------------------------------------
    | Trade Boards
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/forum/trade', 'TradeBoardsController@overview');

    /*
    |--------------------------------------------------------------------------
    | Community Boards
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/forum/community', 'CommunityBoardsController@overview');

    /*
    |--------------------------------------------------------------------------
    | Support Boards
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/forum/support', 'SupportBoardsController@overview');

    /*
    |--------------------------------------------------------------------------
    | Trade Boards
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/forum/guild', 'GuildBoardsController@overview');

});
