<?php
include 'conn.php';

$fullName = $_POST['fullName'];
$NID = $_POST['NID'];
$gender = $_POST['gender'];
$presentAddress = $_POST['presentAddress'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$image = "";
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
}
$faculty = $_POST['faculty'];
$department = $_POST['department'];
$designation = $_POST['designation'];
$joiningDate = $_POST['joiningDate'];
$qualification = $_POST['qualification'];
$experience = $_POST['experience'];


$sql = "INSERT INTO teacherdata (fullName, NID, gender, presentAddress, mobile, email, image, faculty, department, designation, joiningDate, 	qualification, experience) 
    VALUES ('$fullName', '$NID', '$gender', '$presentAddress', '$mobile', '$email', '$image', '$faculty', '$department', '$designation', '$joiningDate', '$qualification', $experience)";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully<br><br>";
  echo "<a href='./showTeacherData.php'>See the Teacher's Data</a><br>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

echo "<br>Submitted Teacher's data are:<br>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>