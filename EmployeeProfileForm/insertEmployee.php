<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $marital_status = mysqli_real_escape_string($conn, $_POST['marital_status']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $years_of_experience = mysqli_real_escape_string($conn, $_POST['years_of_experience']);
    
    $skills = "";
    if (isset($_POST['skills']) && is_array($_POST['skills'])) {
        $skills = implode(", ", $_POST['skills']);
    }
    $skills = mysqli_real_escape_string($conn, $skills);
    
    $sql = "INSERT INTO employeedata (full_name, email, phone, marital_status, position, company, years_of_experience, skills) 
            VALUES ('$full_name', '$email', '$phone', '$marital_status', '$position', '$company', '$years_of_experience', '$skills')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<h2 align='center'>Employee data inserted successfully!</h2>";
        echo "<p align='center'><a href='index.html'>Add Another Employee</a> | <a href='showEmployeeData.php'>View All Employees</a></p>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>