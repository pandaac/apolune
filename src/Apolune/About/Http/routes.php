<?php

$router->group(['prefix' => '/about', 'namespace' => 'Apolune\About\Http\Controllers'], function ($router) {
    $router->get('/server', 'AboutController@server');
    $router->get('/features', 'AboutController@features');
    $router->get('/premium', 'AboutController@premium');

    $router->get('/screenshots', 'ScreenshotController@index');
});
