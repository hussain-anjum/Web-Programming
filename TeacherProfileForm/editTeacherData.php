<?php
include 'conn.php';

$id = $_GET['ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullName = $_POST['fullName'];
  $NID = $_POST['NID'];
  $gender = $_POST['gender'];
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

  $sql = "UPDATE teacherdata SET 
    fullName = '$fullName',
    NID = '$NID',
    gender = '$gender',
    presentAddress = '$presentAddress',
    mobile = '$mobile',
    email = '$email',
    image = '$image',
    faculty = '$faculty',
    department = '$department',
    designation = '$designation',
    joiningDate = '$joiningDate',
    qualification = '$qualification',
    experience = '$experience'
    WHERE ID = '$id'";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully<br><br>";
    echo "<a href='./showTeacherData.php'>Back to Teacher List</a>";
    exit;
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

$sql = "SELECT * FROM teacherdata WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Teacher</title>
</head>
<body>
  <h2 align="center"><u>Edit Teacher Data</u></h2>
  <form action="" method="post" align="center">
    
    <label>Full Name:</label><br>
    <input type="text" name="fullName" value="<?php echo $row['fullName']; ?>"><br><br>

    <label>NID:</label><br>
    <input type="text" name="NID" value="<?php echo $row['NID']; ?>"><br><br>

    <label>Gender:</label><br>
    <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br><br>

    <label>Present Address:</label><br>
    <textarea name="presentAddress" rows="2" cols="40"><?php echo $row['presentAddress']; ?></textarea><br><br>

    <label>Mobile:</label><br>
    <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

    <label>Image:</label><br>
    <input type="text" name="image" value="<?php echo $row['image']; ?>"><br><br>

    <label>Faculty:</label><br>
    <input type="text" name="faculty" value="<?php echo $row['faculty']; ?>"><br><br>

    <label>Department:</label><br>
    <input type="text" name="department" value="<?php echo $row['department']; ?>"><br><br>

    <label>Designation:</label><br>
    <input type="text" name="designation" value="<?php echo $row['designation']; ?>"><br><br>

    <label>Joining Date:</label><br>
    <input type="date" name="joiningDate" value="<?php echo $row['joiningDate']; ?>"><br><br>

    <label>Qualification:</label><br>
    <input type="text" name="qualification" value="<?php echo $row['qualification']; ?>"><br><br>

    <label>Experience:</label><br>
    <input type="number" name="experience" min="0" value="<?php echo $row['experience']; ?>"><br><br>

    <button type="submit">Update</button>
  </form>
</body>
</html>