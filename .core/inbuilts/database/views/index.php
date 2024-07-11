
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

<div class="container bg-gray h-full">
    <div class="flex h-full">
        <div class="flex-20 border">
            <div class="p-2">
                <div class="p-3 border bg-light-blue mb-2 text-right cursor-pointer" >Home</div>
                <div class="p-3 border bg-light-blue mb-2 text-right cursor-pointer" >Create</div>
                <div class="p-3 border bg-light-blue mb-2 text-right cursor-pointer" >Update</div>
            </div>
        </div>
        <div class="flex-grow ">
            <main class="p-2">
                <head>
                    <div class="p-2">
                        <h1>ADmin</h1>
                        <p>Abhijaan Database minified</p>
                    </div>
                </head>
                <!-- home -->
                <section id="ahmp">
                <?php
                require_once ROOT.'/.core/inbuilts/database/views/createForm.php';
                ?>
                </section>

                <!-- create -->
                <section id="actp">
                <?php
                // require_once ROOT.'/.core/inbuilts/database/views/createForm.php';
                ?>
                </section>

                <!-- update --> 
                <section id="atup">
                    <!-- update -->
                </section>
            </main>
        </div>
    </div>
</div>

