<?php

$router->group(['middleware' => 'web', 'namespace' => 'Apolune\Library\Http\Controllers'], function ($router) {

    /*
    |--------------------------------------------------------------------------
    | CreatureController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */
   
    $router->get('/library/creatures', 'CreatureController@index');

    /*
    |--------------------------------------------------------------------------
    | GenericController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */

    $router->get('/library/achievements', 'GenericController@achievements');
    $router->get('/library/experience', 'GenericController@experience');
    $router->get('/library/genesis/{page?}', 'GenericController@genesis');
    $router->get('/library/quests', 'GenericController@quests');

    /*
    |--------------------------------------------------------------------------
    | MapController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */

    $router->get('/library/maps', 'MapController@index');
    $router->get('/library/maps/{area}', 'MapController@show');

    /*
    |--------------------------------------------------------------------------
    | SpellController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */
    
    $router->get('/library/spells', 'SpellController@index');

});
