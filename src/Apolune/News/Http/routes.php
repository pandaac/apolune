<?php

$router->group(['prefix' => '/', 'namespace' => 'Apolune\News\Http\Controllers'], function ($router) {
    $router->get('/', 'LatestController@index');

	$router->get('/archive', 'ArchiveController@index');
});
