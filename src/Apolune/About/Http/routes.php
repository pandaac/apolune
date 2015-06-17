<?php

$router->group(['prefix' => '/about', 'namespace' => 'Apolune\About\Http\Controllers'], function ($router) {
	$router->get('/', 'AboutController@server');
});
