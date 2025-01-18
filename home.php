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
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Menu -->
    <div class="navbar">
    <div class="logo">
        <a href="home.php">
            <img src="images/logo.jpg" alt="Logo">
        </a>
    </div>
        <div class="menu">
            <a href="home.php">Home</a>
            <a href="services">Services</a>
            <a href="about">About Us</a>
            <a href="contact">Contact</a>
            <a href="help">Help</a>
        </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="upper">
					            <!-- Sliding Images -->
    <img src="images/background.jpg" class="active" alt="Background 1">
    <img src="images/image2.jpg" alt="Image 2">
    <img src="images/image3.jpg" alt="Image 3">
    <img src="images/image4.jpg" alt="Image 4">
    <img src="images/image5.jpg" alt="Image 5">
        </div>
		<div class="overlay-text">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            <p>Areayako Deliveries is an errand & delivery company purposing to provide top-notch services closer to doorstep.</p>
			</div>

        <div class="lower">
            <div class="socials">
                <h3>Follow Us</h3>
                <p>Facebook: <a href="https://facebook.com" target="_blank">facebook.com</a></p>
                <p>Twitter: <a href="https://x.com/areayako?t=kUcvUvP-zAalzSTeGkuoOQ&s=08" target="_blank">twitter.com</a></p>
                <p>Instagram: <a href="https://www.instagram.com/areayako?igsh=MXQzMXJ2cnc2cmZtdA==" target="_blank">instagram.com</a></p>
				<p>Tiktok: <a href="https://www.tiktok.com/@areayako?_t=ZM-8t8Tk6wBdG2&_r=1" target="_blank">tiktok.com</a></p>
            </div>
            <div class="contact">
                <h3>Contact Us</h3>
                <p>Email: support@example.com</p>
                <p>Phone: +254 155 869 410</p>
				<p>Nairobi,Kenya</p>
            </div>
            <div class="about">
                <h3>About Us</h3>
                <p>We are committed to providing exceptional services and creating meaningful connections with our users. Feel free to explore our platform!</p>
            </div>
        </div>
    </div>
	
	    <script src="script.js"></script>
</body>
</html>
