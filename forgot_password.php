<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "user_auth";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

     // Prepare the query to check if email exists
    $query = $conn->prepare("SELECT id, username, email FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Generate a unique reset token
        $reset_token = bin2hex(random_bytes(16)); // Generate a secure 32-character token

        // Save the reset token in the database for the user
        $query = $conn->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
        $query->bind_param("ss", $reset_token, $email);
        $query->execute();

        // Generate the password reset link
        $reset_link = "http://localhost/areayako deliveries/reset_password.php?token=" . $reset_token;

        // Display the reset link on the page
        echo "<p>Your password reset link is:</p>";
        echo "<a href='$reset_link'>$reset_link</a>";
    } else {
        echo "<p>Email not found!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h1>Forgot Password</h1>
    <form method="POST" action="forgot_password.php">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Reset Password</button>
    </form>
    <p>Remember your password? <a href="index.php">Login</a></p>
	</div>
</body>
</html>
