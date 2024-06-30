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
// main header
require_once 'public/index.php';

// redirects the routes
require_once redirector();
