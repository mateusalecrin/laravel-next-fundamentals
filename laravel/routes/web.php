<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $routes = Route::getRoutes()->getRoutes();

    $endpoints = [];

    foreach ($routes as $route) {
        $endpoints[] = [
            'uri'        => $route->uri(),
            'methods'    => array_values(array_diff($route->methods(), ['HEAD'])),
            'name'       => $route->getName(),
            'action'     => $route->getActionName(),
            'middleware' => $route->middleware(),
        ];
    }

    return view('welcome', compact('endpoints'));
});
