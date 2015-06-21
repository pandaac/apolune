<?php

$router->group(['namespace' => 'Apolune\Library\Http\Controllers'], function () {

    /*
    |--------------------------------------------------------------------------
    | CreatureController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */
   
    get('/library/creatures', 'CreatureController@index');

    /*
    |--------------------------------------------------------------------------
    | GenericController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */

    get('/library/achievements', 'GenericController@achievements');
    get('/library/experience', 'GenericController@experience');
    get('/library/genesis', 'GenericController@genesis');
    get('/library/quests', 'GenericController@quests');

    /*
    |--------------------------------------------------------------------------
    | MapController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */

    get('/library/maps', 'MapController@index');
    get('/library/maps/{area}', 'MapController@show');

    /*
    |--------------------------------------------------------------------------
    | SpellController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */
    
    get('/library/spells', 'SpellController@index');

});
