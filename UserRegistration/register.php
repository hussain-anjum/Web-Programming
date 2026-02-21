<?php
include "connect.php";

$username = $_POST["username"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$email = $_POST["email"];
$fullname = $_POST["fullname"];
$contact = $_POST["contact"];

if ($password != $confirm_password) {
    echo "Passwords didn't match. <a href='register.html'>Try again</a>";
} else {
    $check = "SELECT * FROM userreg WHERE username='$username'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists. <a href='register.html'>Try again</a>";
    } else {
        $sql = "INSERT INTO userreg (username, password, email, fullname, contact)
                VALUES ('$username', '$password', '$email', '$fullname', '$contact')";
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful. <a href='login.html'>Login here</a>";
        } else {
            echo "Registration failed.";
        }
    }
}
?>