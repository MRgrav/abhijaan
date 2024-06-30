<?php

// namespace Core;

// secure
require_once 'inbuilts/secure/secure.php';

// route
require_once 'inbuilts/routing/route.php';

// connection
require_once 'inbuilts/connection/connection.php';

// for user routes
require_once ROOT.'/routes/routes.php';

// asset()
function asset($path) {
    return "/public/".$path;
}


function redirector() {
    // getting parsed uri
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    // using route as global
    global $route;
    // getting the key for the route array
    $key_uri = routeFilter($uri, $query);
    // echo $key_uri;
    // echo $route[$key_uri];
    // route redirecting
    if (isset($route[$key_uri])) {
    $viewPath = $route[$key_uri];
    if (file_exists($viewPath)) { 
        return $viewPath;
    } else {
        // echo "4041 Not Found";
        echo "1";
        return ROOT.'/.core/inbuilts/errors/404.php';
    }
    } else {
    // route not found
    return ROOT.'/.core/inbuilts/errors/404.php';
    }
}

function routeFilter($uri, $query) {
    if (!$query) {
      return $uri;
    } else {
      $uri = rtrim($uri, '/');
      return $uri . '/GET';
    }
}