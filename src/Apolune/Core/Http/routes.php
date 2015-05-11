<?php

$router->group(['prefix' => '/'], function($router)
{
	$router->get('/terms', 'DocumentController@terms');
	$router->get('/rules', 'DocumentController@rules');
	$router->get('/privacy', 'DocumentController@privacy');
});
