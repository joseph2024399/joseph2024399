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
    <title>Services</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <!-- Navigation Bar -->
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

    <!-- Main Layout -->
    <div class="main-layout">
        <!-- Sidebar Menu -->
        <div class="sidebar" id="sidebar">
            <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
            <div class="menu-items">
                <a href="#" data-target="transport">Transport</a>
                <a href="#" data-target="soko-errand">Soko Errand</a>
                <a href="#" data-target="deliveries">Deliveries</a>
                <a href="#" data-target="shopping-errand">Shopping Errand</a>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content" id="content">
            <h1>Welcome to Our Services</h1>
            <p>Select a service from the menu to view details.</p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
