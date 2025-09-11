<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Welcome <?php echo $_SESSION['username']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>