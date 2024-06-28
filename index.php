<?php

// ./index.php

// uncomment the below line when developing and debugging
ini_set('display_errors', 1);

// Define constants for paths
define('ROOT', __DIR__);

// config
require_once 'config/config.php';
// core files
require_once '.core/core.php';
// for user routes
require_once 'routes/routes.php';
// main header
require_once 'public/index.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (isset($route[$uri])) {
  $viewPath = $route[$uri];
  if (file_exists($viewPath)) {
    require_once $viewPath;
  } else {
    // echo "4041 Not Found";
	require_once ROOT.'/.core/inbuilts/errors/404.php';
  }
} else {
  // route not found
  require_once ROOT.'/.core/inbuilts/errors/404.php';
}

