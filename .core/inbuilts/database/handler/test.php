<?php

// Database credentials (replace with your actual details)
// $host = "localhost";
// $username = "your_username";
// $password = "your_password";
// $databaseName = "your_database_name"; // Specify database name

// Error handling flag (initialize to false)
$hasError = false;
$errorMessage = "";

try {
  // Connect to chosen database (replace with appropriate PDO connection string)
//   $conn = new PDO("mysql:host=$host;dbname=$databaseName", $username, $password);
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Get user input (replace with proper validation)
  $tableName = trim($_POST["tableName"]); // Sanitize table name
  $columnNames = array_map('trim', $_POST["colName"]); // Sanitize column names
  $columnTypes = $_POST["colType"];
//   $columnSizes = $_POST["colSize"]; // Can be empty if not applicable
  $columnPrimaryKeys = $_POST["colPrimaryKey"];
  $columnForeignKeys = $_POST["colForeignKey"];
  $columnNullable = $_POST["colNullable"];

  // Basic input validation (add more as needed)
  if (empty($tableName)) {
    $hasError = true;
    $errorMessage .= "Error: Please enter a table name.<br>";
  }

  if (count($columnNames) === 0) {
    $hasError = true;
    $errorMessage .= "Error: Please define at least one column.<br>";
  }

  // Validate column definitions (data type, size, primary/foreign key constraints)
  for ($i = 0; $i < count($columnNames); $i++) {
    if (empty($columnNames[$i])) {
      $hasError = true;
      $errorMessage .= "Error: Column name cannot be empty.<br>";
    }

    if (empty($columnTypes[$i])) {
      $hasError = true;
      $errorMessage .= "Error: Please select a data type for column '" . $columnNames[$i] . "'.<br>";
    } else {
      // Check if size is required for the data type
      if (in_array($columnTypes[$i], ["varchar", "decimal"]) && empty($columnSizes[$i])) {
        $hasError = true;
        $errorMessage .= "Error: Please specify a size for column '" . $columnNames[$i] . "'.<br>";
      }
    }

    if ($columnPrimaryKeys[$i] === "YES" && count(array_filter($columnPrimaryKeys, fn($key) => $key === "YES")) > 1) {
      $hasError = true;
      $errorMessage .= "Error: Only one column can be a primary key.<br>";
    }

    // Implement additional validation for foreign keys (e.g., referencing existing tables/columns)
  }

  // Create table query (if no errors)
  if (!$hasError) {
    $sql = "CREATE TABLE $tableName (";
    for ($i = 0; $i < count($columnNames); $i++) {
      $colName = $conn->quote($columnNames[$i]); // Escape column names to prevent SQL injection
      $colType = $columnTypes[$i];
    //   $colSize = !empty($columnSizes[$i]) ? "(" . $columnSizes[$i] . ")" : "";
      $colPrimaryKey = $columnPrimaryKeys[$i] === "YES" ? " PRIMARY KEY" : "";
      $colForeignKey = ""; // Implement foreign key constraint logic here (if applicable)
      $colNullable = $columnNullable[$i] === "true" ? " NULL" : " NOT NULL";

      $sql .= "`$colName` $colType$colPrimaryKey$colForeignKey$colNullable,";
    }
    $sql = rtrim($sql, ",") . ")"; // Remove trailing comma

    $pdo->exec($sql);
    echo "Table '$tableName' created successfully!";
  } else {
    echo "Error(s) encountered during table creation:<br>";
    echo $errorMessage;
  }
} catch(PDOException $e) {
  echo "Error creating table: " . $e->getMessage();
}

// Close connection (not strictly necessary with PDO)
// $conn = null;

?>
