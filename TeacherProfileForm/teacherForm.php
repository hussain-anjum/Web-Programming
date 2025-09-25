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

$fullName = $_POST['fullName'];
$NID = $_POST['NID'];
$gender = $_POST['gender'];
$permanentAddress = $_POST['permanentAddress'];
$presentAddress = $_POST['presentAddress'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$image = $_POST['image'];
$faculty = $_POST['faculty'];
$department = $_POST['department'];
$designation = $_POST['designation'];
$joiningDate = $_POST['joiningDate'];
$qualification = $_POST['qualification'];
$experience = $_POST['experience'];


$sql = "INSERT INTO teacherdata (fullName, NID, gender, permanentAddress, presentAddress, mobile, email, image, faculty, department, designation, joiningDate, 	qualification, experience) 
    VALUES ('$fullName', '$NID', '$gender', '$permanentAddress', '$presentAddress', '$mobile', '$email', '$image', '$faculty', '$department', '$designation', '$joiningDate', '$qualification', $experience)";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully<br><br>";
  //echo "<a href='showData.php'>See the Teacher's Data</a>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

echo "Teacher's data are:<br>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>