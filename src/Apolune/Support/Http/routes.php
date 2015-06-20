<?php

$router->group(['prefix' => '/support', 'namespace' => 'Apolune\Support\Http\Controllers'], function ($router) {
    $router->get('/legal', 'DocumentController@index');
    $router->get('/terms', 'DocumentController@terms');
    $router->get('/rules', 'DocumentController@rules');
    $router->get('/privacy', 'DocumentController@privacy');

    $router->get('/faq', 'FAQController@index');

    $router->get('/tutor', 'TutorController@index');
});
