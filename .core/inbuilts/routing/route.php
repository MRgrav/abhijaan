<?php

$route = [
	'/' => ROOT.'/views/index.php',
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