<?php
// reset_password.php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_auth";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate the reset token
    $query = $conn->prepare("SELECT id FROM users WHERE reset_token = ?");
    $query->bind_param("s", $token);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Token is valid, show password reset form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = $_POST['new_password'];
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);  // Hash the new password

            // Update the user's password and clear the reset token
            $query = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?");
            $query->bind_param("ss", $hashed_password, $token);
            $query->execute();

            echo "<p>Your password has been reset successfully! <a href='index.php'>Login</a></p>";
        }
    } else {
        echo "<p>Invalid or expired reset token.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h1>Reset Password</h1>
    <form method="POST" action="reset_password.php?token=<?php echo htmlspecialchars($_GET['token']); ?>">
        <input type="password" name="new_password" placeholder="Enter new password" required>
        <button type="submit">Reset Password</button>
    </form>
</div>
</body>
</html>
