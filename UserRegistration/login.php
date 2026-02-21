<?php
include "connect.php";
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM userreg WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $_SESSION["user"] = $username;
    header("Location: dashboard.php");
    exit();
} else {
    echo "Wrong username or password. <a href='login.html'>Try again</a>";
}
?>