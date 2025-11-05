<?php
include "connect.php";

$username = trim($_POST["username"]);
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$confirm_password = $_POST["confirm_password"];
$email = trim($_POST["email"]);
$fullname = trim($_POST["fullname"]);
$contact = trim($_POST["contact"]);

if($_POST["password"] != $confirm_password){
    echo "Password didn't match. <a href = 'register.html'>Try again!</a>";
}
elseif ($username && $email && $fullname && $contact && $_POST["password"]) {
    $check = "SELECT * FROM users WHERE username='$username'";
    $res = mysqli_query($conn, $check);
    
    if (mysqli_num_rows($res) > 0) {
        echo "Username already exists. <a href='register.html'>Try again</a>";
    } else {
        $sql = "INSERT INTO users (username, password, email, fullname, contact)
                VALUES ('$username', '$password', '$email', '$fullname', '$contact')";
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful. <a href='login.html'>Login here</a>";
            // header("Location: login.html");
            exit();
        } else {
            echo "Registration failed.";
        }
    }
}
else {
    echo "All fields are required.";
}
?>