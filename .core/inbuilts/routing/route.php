<?php

$route = [
	'/' => ROOT.'/views/index.php',
	// ...
	'/abhijaan/is-connected' => ROOT.'/.core/inbuilts/connection/connectionMessage.php',
	'/abhijaan/my-tables' => ROOT.'/.core/inbuilts/database/views/index.php',
];

function route($uri = null, $path= null) {
	global $route;
	$uri = secure_data($uri);
	$path = secure_data($path);

	if ($path && $uri) {
		if (isset($route[$uri])) {
			error_log("Path already assigned");
		}
		// asign
		$route[$uri] = ROOT.'/views/'.$path;
	}
	return $route;
}
