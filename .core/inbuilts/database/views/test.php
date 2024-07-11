<?php

// Check if $pdo is set and valid
if (!isset($pdo)) {
    echo "Database connection is not established.";
    exit;
}
$dbName = DB_NAME;

try {
    // SQL query to fetch table names
    $sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public' and table_catalog = :dbName";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':dbName', $dbName);
    $stmt->execute();
    
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
} catch (PDOException $e) {
    echo "Error fetching table names: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table Creation Form</title>
</head>
<body>
    <h1>Dynamic Table Creation Form</h1>
    <form id="createTableForm" method="post">
        <label for="tableName">Table Name:</label>
        <input type="text" name="tableName" id="tableName" required><br>
        <div id="columnList">
             
        </div>
        <br>
        <button type="submit">Create Table</button>
    </form>
    
</body>
</html>

