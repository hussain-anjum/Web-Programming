<?php
session_start();
include "connect.php";

if (!isset($_SESSION["user"])) {
    header("Location: index.html");
    exit();
}

$username = $_SESSION["user"];
$sql = "SELECT fullname, email, contact FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h2>Hello, <?php echo htmlspecialchars($user["fullname"]); ?>!</h2>
    <p>Email: <?php echo htmlspecialchars($user["email"]); ?></p>
    <p>Contact: <?php echo htmlspecialchars($user["contact"]); ?></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>