<?php

// Error message (initialize to empty)
$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get form data (sanitize inputs!)
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);

  // Basic validation
  if (empty($email) || empty($password)) {
    $errorMessage = "Please fill in all required fields.";
  } else {

    try {

      // Prepare SQL statement for user retrieval
      $sql = "SELECT id, password FROM users WHERE email = :email";
      $stmt = $pdo->prepare($sql);

      // Bind parameters to prevent SQL injection
      $stmt->bindParam(":email", $email);

      // Execute the statement
      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch the user row

      // Check if user exists and password matches (hashed password)
      if ($user && password_verify($password, $user["password"])) {
        // Login successful! (start a session or redirect)
        session_start();
        $_SESSION["user_id"] = $user["id"];
        header("Location: home.php");  // Redirect to a home page after login
      } else {
        $errorMessage = "Invalid email or password.";
      }
    } catch(PDOException $e) {
      $errorMessage = "Error: " . $e->getMessage();
    }

    $pdo = null; // Close connection
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>
<body>

  <?php if (!empty($errorMessage)) : ?>
    <p style="color: red;"><?php echo $errorMessage; ?></p>
  <?php endif; ?>

  <form method="post" action="<?= $route['/login'] ?>">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Login">
  </form>

</body>
</html>
