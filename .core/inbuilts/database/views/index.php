<?php


// Check if $pdo is set and valid
if (!isset($pdo)) {
    echo "Database connection is not established.";
    exit;
}

$dbName = DB_NAME;

try {
    // SQL query to fetch table names
    // $sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = :dbname ORDER BY table_name";
    $sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public' and table_catalog = :dbName";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':dbName', $dbName);

    $stmt->execute();
    

    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Output table names
    if ($tables) {
        echo "Tables in the database:<br>";
        foreach ($tables as $table) {
            echo $table . "<br>";
        }
    } else {
        echo "No tables found.";
    }
} catch (PDOException $e) {
    echo "Error fetching table names: " . $e->getMessage();
}
?>
