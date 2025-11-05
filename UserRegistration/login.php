<?php
include "connect.php";
session_start();

$username = trim($_POST["username"]);
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
        $_SESSION["user"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Wrong password. <a href='login.html'>Try again</a>";
    }
} else {
    echo "No account found. <a href='register.html'>Register here</a>";
}
?>