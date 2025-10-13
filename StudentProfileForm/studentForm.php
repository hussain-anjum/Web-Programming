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

$name = $_POST['name'];
$fatherName = $_POST['fatherName'];
$motherName = $_POST['motherName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$presentAddress = $_POST['presentAddress'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$image = $_POST['image'];
$faculty = $_POST['faculty'];
$department = $_POST['department'];
$hallName = $_POST['hallName'];
$roll = $_POST['roll'];
$regNo = $_POST['regNo'];
$session = $_POST['session'];


$sql = "INSERT INTO studentdata (name, fatherName, motherName, dob, gender, presentAddress, mobile, email, image, faculty, department, hallName, roll, regNo, session) 
    VALUES ('$name', '$fatherName', '$motherName', '$dob', '$gender', '$presentAddress', '$mobile', '$email', '$image', '$faculty', '$department', '$hallName', '$roll', '$regNo', '$session')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully<br><br>";
  echo "<a href='./showStudentData.php'>See the Student's Data</a><br><br>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

echo "Student data are:<br>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>