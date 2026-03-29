<?php

if (!function_exists('active')) {
    function active($routes, $class = 'active')
    {
        foreach ((array) $routes as $route) {
            if (request()->routeIs($route)) {
                return $class;
            }
        }

        return '';
    }
}