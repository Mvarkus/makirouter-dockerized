<?php

require __DIR__ . "/../vendor/autoload.php";

Mvarkus\MakiRouter::init(
   __DIR__ . '/../routes/web.php', // path to routes file
   'App\Controllers', // controllers location
   ['id' => '[0-9]+'] // shared patterns
);

Mvarkus\MakiRouter::routeRequest(
    Symfony\Component\HttpFoundation\Request::createFromGlobals()
)->send();