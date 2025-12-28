<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$roll = $_GET['roll'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
  $regNo = $_POST['regNo'];
  $session = $_POST['session'];

  $sql = "UPDATE studentdata SET 
    name = '$name',
    fatherName = '$fatherName',
    motherName = '$motherName',
    dob = '$dob',
    gender = '$gender',
    presentAddress = '$presentAddress',
    mobile = '$mobile',
    email = '$email',
    image = '$image',
    faculty = '$faculty',
    department = '$department',
    hallName = '$hallName',
    regNo = '$regNo',
    session = '$session'
    WHERE roll = '$roll'";

  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully<br><br>";
    echo "<a href='./showStudentData.php'>Back to Student List</a>";
    exit;
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

$sql = "SELECT * FROM studentdata WHERE roll = '$roll'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
</head>
<body>
  <h2 align="center"><u>Edit Student Data</u></h2>
  <form action="" method="post" align="center">
    
    <label>Full Name:</label><br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

    <label>Father's Name:</label><br>
    <input type="text" name="fatherName" value="<?php echo $row['fatherName']; ?>"><br><br>

    <label>Mother's Name:</label><br>
    <input type="text" name="motherName" value="<?php echo $row['motherName']; ?>"><br><br>

    <label>Date of Birth:</label><br>
    <input type="date" name="dob" value="<?php echo $row['dob']; ?>"><br><br>

    <label>Gender:</label><br>
    <select name="gender">
      <option value="Male" <?php if($row['gender'] == "Male") echo "selected"; ?>>Male</option>
      <option value="Female" <?php if($row['gender'] == "Female") echo "selected"; ?>>Female</option>
      <option value="Other" <?php if($row['gender'] == "Other") echo "selected"; ?>>Other</option>
    </select><br><br>

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

    <label>Department:</label><br>
    <select name="department">
      <option value="CSE" <?php if($row['department'] == "CSE") echo "selected"; ?>>Department Of CSE</option>
      <option value="EEE" <?php if($row['department'] == "EEE") echo "selected"; ?>>Department Of EEE</option>
      <option value="ESE" <?php if($row['department'] == "ESE") echo "selected"; ?>>Department of ESE</option>
    </select><br><br>

    <label>Hall:</label><br>
    <input type="text" name="hallName" value="<?php echo $row['hallName']; ?>"><br><br>

    <label>Roll:</label><br>
    <input type="text" name="roll" value="<?php echo $row['roll']; ?>" readonly><br><br>

    <label>Reg. No:</label><br>
    <input type="text" name="regNo" value="<?php echo $row['regNo']; ?>"><br><br>

    <label>Session:</label><br>
    <input type="text" name="session" value="<?php echo $row['session']; ?>"><br><br>

    <button type="submit">Update</button>
  </form>
</body>
</html>