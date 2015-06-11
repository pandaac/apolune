<?php

$router->group(['prefix' => '/support', 'namespace' => 'Apolune\Support\Http\Controllers'], function ($router) {
    $router->get('/terms', 'DocumentController@terms');
    $router->get('/rules', 'DocumentController@rules');
    $router->get('/privacy', 'DocumentController@privacy');
});
