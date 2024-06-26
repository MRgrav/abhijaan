<?php

// namespace Core;

// secure
require_once 'inbuilts/secure/secure.php';

// route
require_once 'inbuilts/routing/route.php';

// connection
require_once 'inbuilts/connection/connection.php';

// asset()
function asset($path) {
    return "/public/".$path;
}



