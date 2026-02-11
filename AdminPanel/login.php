<?php
session_start();
include 'conn.php';

if (isset($_SESSION['username'])) {
    header('Location: admin.php');
    exit;
}
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify password with MySQL PASSWORD() function equivalent
        $pass_check_query = "SELECT PASSWORD('$password') as pass_hash";
        $pass_check_res = mysqli_query($conn, $pass_check_query);
        $pass_row = mysqli_fetch_assoc($pass_check_res);

        if ($row['password'] === $pass_row['pass_hash']) {
            $_SESSION['username'] = $username;
            header('Location: admin.php');
            exit;
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>
<!DOCTYPE html>
<html>
    <head><title>Admin Login</title></head>
<body>
    <h2>Admin Login</h2>
    <?php if($error): ?>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>