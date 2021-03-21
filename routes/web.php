<?php

use Mvarkus\MakiRouter as Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

Router::get('/', function() {
    return new Response('Homepage');
});

Router::get(
    '/users/{firstName}/{secondName}',
    function (
        string $firstName,
        string $secondName
    ) {
        return new Response("Full name: $firstName $secondName");
    }
)->with(['firstName|secondName' => '[a-zA-Z]+']);

Router::get('/users/{id?}/username',
    function (int $id) {
        return new Response(
            $id === null ? 
            "Username of logged user":
            "Username of an user with id #$id"
        );
    }
);

Router::group([
    'prefix' => 'dashboard/{dashboardId?}',
    'with' => ['dashboardId' => '[0-9]+'],
    'default' => ['dashboardId' => 10]
], function() {
    Router::get('/', function (int $dashboardId) {
        return new Response("Dashboard #{$dashboardId}");
    });

    Router::get('posts/{pId}', function (int $dashboardId, int $pId) {
        return new Response("Post id #{$pId} on dashboard #{$dashboardId}");
    })->with(['pId' => '[0-9]+']);
});

// User
Router::get('/users', 'UserController@index');
Router::post('/users', 'UserController@store');
Router::get('/users/{id}', 'UserController@show');
Router::put('/users/{id}', 'UserController@update');
Router::delete('/users/{id}', 'UserController@destroy');