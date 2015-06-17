<?php

$router->group(['prefix' => '/library', 'namespace' => 'Apolune\Library\Http\Controllers'], function ($router) {
    $router->get('/creatures', 'CreatureController@index');

    $router->get('/experience', 'ExperienceController@index');

    $router->get('/maps', 'MapController@index');
    $router->get('/maps/{area}', 'MapController@show');
});
