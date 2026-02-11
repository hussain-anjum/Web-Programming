<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Panel</title></head>
<body>
<h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>

<ul>
    <li><a href="security.php">Security Page</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<p>This is the admin panel demo page.</p>
</body>
</html>