<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Security Page</title></head>
<body>
<h2>Security Page</h2>
<p>This page is only accessible to logged-in users.</p>

<p><a href="admin.php">Back to Admin Demo</a> | <a href="logout.php">Logout</a></p>
</body>
</html>