<?php

$pdo;

switch (DB) {
    case "pgsql":
        postgres(DB_HOST, DB_NAME, DB_USER, DB_PASS);
        break;

}

function postgres($host, $dbname, $user, $password) {
    global $pdo;
    // try {
        $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;";
        // make a database connection
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
        // if ($pdo) {
        //     echo "Connected to the $dbname database successfully!";
        // }
    // } catch (PDOException $e) {
    //     die($e->getMessage());
    // }
}