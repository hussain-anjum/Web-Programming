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
    <select name="faculty">
      <option value="Science&Engg." <?php if($row['faculty'] == "Science&Engg.") echo "selected"; ?>>Faculty Of Science and Engineering</option>
      <option value="Arts" <?php if($row['faculty'] == "Arts") echo "selected"; ?>>Faculty Of Arts</option>
      <option value="BBA" <?php if($row['faculty'] == "BBA") echo "selected"; ?>>Faculty Of BBA</option>
      <option value="SocialScience" <?php if($row['faculty'] == "SocialScience") echo "selected"; ?>>Faculty Of Social Science</option>
    </select><br><br>

    <label for="department">Department:</label><br>
    <select name="department">
      <option value="CSE" <?php if($row['department'] == "CSE") echo "selected"; ?>>Department Of CSE</option>
      <option value="EEE" <?php if($row['department'] == "EEE") echo "selected"; ?>>Department Of EEE</option>
      <option value="ESE" <?php if($row['department'] == "ESE") echo "selected"; ?>>Department of ESE</option>
    </select><br><br>

    <label>Designation:</label><br>
    <select name="designation">
      <option value="Professor" <?php if($row['designation'] == "Professor") echo "selected"; ?>>Professor</option>
      <option value="Associate Professor" <?php if($row['designation'] == "Associate Professor") echo "selected"; ?>>Associate Professor</option>
      <option value="Assistant Professor" <?php if($row['designation'] == "Assistant Professor") echo "selected"; ?>>Assistant Professor</option>
      <option value="Lecturer" <?php if($row['designation'] == "Lecturer") echo "selected"; ?>>Lecturer</option>
    </select><br><br>

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