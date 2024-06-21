<?php

// namespace Core;

// secure
require_once 'inbuilts/secure/secure.php';

// route
require_once 'inbuilts/routing/route.php';

// use Inbuilts\Route;


// asset()
function asset($path) {
    return "/public/".$path;
}