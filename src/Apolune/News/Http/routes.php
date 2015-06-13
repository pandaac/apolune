<?php

$router->group(['prefix' => '/', 'namespace' => 'Apolune\News\Http\Controllers'], function ($router) {
	$router->get('/', 'NewsController@getNews');
});
