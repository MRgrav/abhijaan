<?php

if ($pdo) {
    echo "Connected to the  database successfully!";
}

// Error message (initialize to empty)
$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get form data (sanitize inputs!)
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);

  // Attempt to create the table if it doesn't exist (optional)
  try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS public.users (
      id SERIAL PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL UNIQUE,  -- Enforce unique emails
      password VARCHAR(255) NOT NULL
    )");
  } catch (PDOException $e) {
    // Handle potential errors during table creation (optional)
    $errorMessage = "Error creating table: " . $e->getMessage();
  }


  // Basic validation (more can be added)
  if (empty($name) || empty($email) || empty($password)) {
    $errorMessage = "Please fill in all required fields.";
  } else {

    try {

      // Hash the password before storing (recommended)
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Prepare SQL statement for insertion
      $sql = "INSERT INTO users(name, email, password) VALUES(:name, :email, :password)";
      $stmt = $pdo->prepare($sql);

      // Bind parameters to prevent SQL injection
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":password", $hashedPassword);

      // Execute the statement
      $stmt->execute();

      // Success message
      $errorMessage = "Registration successful! Please login.";
    } catch(PDOException $e) {
      $errorMessage = "Error: " . $e->getMessage();
    }

    $conn = null; // Close connection
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
</head>
<body>

  <?php if (!empty($errorMessage)) : ?>
    <p style="color: red;"><?php echo $errorMessage; ?></p>
  <?php endif; ?>

  <form method="post" action="/registration">
    <label for="name">name:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Register">
  </form>

</body>
</html>
