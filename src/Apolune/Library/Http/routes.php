<?php

$router->group(['prefix' => '/library', 'namespace' => 'Apolune\Library\Http\Controllers'], function ($router) {
    $router->get('/creatures', 'CreatureController@index');

    $router->get('/experience', 'LibraryController@experience');
    $router->get('/genesis', 'LibraryController@genesis');

    $router->get('/maps', 'MapController@index');
    $router->get('/maps/{area}', 'MapController@show');

    $router->get('/spells', 'SpellController@index');

    $router->get('/achievements', 'AchievementController@index');

    $router->get('/quests', 'QuestController@index');
});
