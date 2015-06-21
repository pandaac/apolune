<?php

$router->group(['namespace' => 'Apolune\News\Http\Controllers'], function () {

    /*
    |--------------------------------------------------------------------------
    | NewsController
    |--------------------------------------------------------------------------
    |
    | The following routes belong to the aforementioned controller.
    |
    */
   
    get('/', 'NewsController@index');
    get('/archive', 'NewsController@archive');

});
