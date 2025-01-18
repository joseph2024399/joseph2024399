<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="home.php">
                <img src="images/logo.jpg" alt="Logo">
            </a>
        </div>
        <div class="menu">
            <a href="home.php">Home</a>
            <a href="services.php">Services</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact</a>
            <a href="help.php">Help</a>
        </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="content">
    <h1>Contact Us</h1>
    <p>Feel free to get in touch via email or phone.</p>
	</div>
</body>
</html>