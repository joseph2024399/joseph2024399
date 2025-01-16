<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $query->bind_param("sss", $username, $email, $password);

    if ($query->execute()) {
        echo "<script>alert('Registration successful!');</script>";
        header("Location: index.php");
    } else {
        echo "<script>alert('Error: " . $query->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
	<link rel="stylesheet" href="style.css"> <!-- Link to the same CSS file -->
</head>
<body>
<div class="login-container">
    <h1>Register</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="index.php">Login</a></p>
	</div>
</body>
</html>
