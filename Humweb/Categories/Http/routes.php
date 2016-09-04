<?php
$router->group(['prefix' => 'backend'], function ($router) {
    $router->group(['prefix' => 'category', 'as' => 'backend.category.'], function ($router) {
        $router->get('data', ['as' => 'data', 'uses' => 'CategoryController@data']);
        $router->get('create/{parent?}', 'CategoryController@createChildOf');
        $router->post('move', ['as' => 'move', 'uses' => 'CategoryController@move']);
        $router->post('{category}', ['as' => 'storeChildOf', 'uses' => 'CategoryController@storeChildOf']);
    });
    $router->get('category/of/{type}', ['as' => 'backend.category.type', 'uses' => 'CategoryController@index']);
    $router->resource('category', 'CategoryController');
});