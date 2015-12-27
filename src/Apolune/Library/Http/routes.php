<?php

$router->group(['middleware' => 'web', 'namespace' => 'Apolune\Library\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | Creatures
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */
   
    $router->get('/library/creatures/{creature}', 'CreatureController@single');
    $router->get('/library/creatures', 'CreatureController@index');

    /*
    |--------------------------------------------------------------------------
    | Generic
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/library/achievements', 'GenericController@achievements');
    $router->get('/library/experience', 'GenericController@experience');
    $router->get('/library/genesis/{page?}', 'GenericController@genesis');
    $router->get('/library/quests', 'GenericController@quests');

    /*
    |--------------------------------------------------------------------------
    | Maps
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */

    $router->get('/library/maps', 'MapController@index');
    $router->get('/library/maps/{area}', 'MapController@show');

    /*
    |--------------------------------------------------------------------------
    | Spells
    |--------------------------------------------------------------------------
    |
    | ...
    |
    */
    
    $router->get('/library/spells', 'SpellController@index');

});
