<?php

// ./index.php

// uncomment the below line when developing and debugging
ini_set('display_errors', 1);

// Define constants for paths
define('ROOT', __DIR__);

define('FAVICON', __DIR__.'/public/favicon.ico');

// config
require_once 'config/config.php';
// core files
require_once '.core/core.php';
// for user routes
require_once 'routes/routes.php';
// main header
require_once 'public/index.php';



// Attempt to connect to the database
// $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "done";
// }

// $host = "localhost";
// $db = "postgres";
// $user = "postgres";
// $password = "postgres";
// $port = "5432";

// $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=UTF8";

// try {
// 	$pdo = new PDO($dsn, $user, $password);

// 	if ($pdo) {
// 		echo "Connected to the $db database successfully!";
// 	}
// } catch (PDOException $e) {
// 	echo $e->getMessage();
// }




// $sql = 'SELECT scheme_code FROM schemes';

// $statement = $pdo->query($sql);

// // get all publishers
// $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

// // echo $publishers;

// if ($publishers) {
// 	// show the publishers
// 	foreach ($publishers as $publisher) {
// 		echo $publisher['scheme_code'] . '<br>';
// 	}
// }








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

