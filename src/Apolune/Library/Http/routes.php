<?php

$router->group(['prefix' => '/library', 'namespace' => 'Apolune\Library\Http\Controllers'], function ($router) {
    $router->get('/creatures', 'LibraryController@getCreatures');

    $router->get('/maps', 'LibraryController@getMaps');
    $router->get('/maps/{area}', 'LibraryController@getMap');
});
