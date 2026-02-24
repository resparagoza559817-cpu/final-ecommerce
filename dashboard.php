<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css">
    <style>
        body { background: url('bgbgbg.webp') no-repeat center center fixed !important; background-size: cover !important; }
    </style>
</head>
<body>
    <audio autoplay loop><source src="webmusic.mp3" type="audio/mpeg"></audio>
    <div class="main-container">
        <div style="text-align: center; width: 100%; color: white;">
            <h2>Welcome Back, <?php echo $_SESSION['username']; ?>!</h2>
            <p>This is a secure session.</p>
            <form method="POST">
                <button type="submit" name="logout" id="logoutBtn">Log Out</button>
            </form>
        </div>
    </div>
</body>
</html>