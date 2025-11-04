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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['roll'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $fatherName = mysqli_real_escape_string($conn, $_POST['fatherName']);
  $motherName = mysqli_real_escape_string($conn, $_POST['motherName']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $presentAddress = mysqli_real_escape_string($conn, $_POST['presentAddress']);
  $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $image = mysqli_real_escape_string($conn, $_POST['image']);
  $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
  $department = mysqli_real_escape_string($conn, $_POST['department']);
  $hallName = mysqli_real_escape_string($conn, $_POST['hallName']);
  $roll = mysqli_real_escape_string($conn, $_POST['roll']);
  $regNo = mysqli_real_escape_string($conn, $_POST['regNo']);
  $session = mysqli_real_escape_string($conn, $_POST['session']);

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
    roll = '$roll',
    regNo = '$regNo',
    session = '$session'
    WHERE roll = '$roll'";

  if (mysqli_query($conn, $sql)) {
    echo "<p>Record updated successfully</p>";
    echo "<a href='./showStudentData.php'>Back to Student List</a>";
  } else {
    echo "<p>Error updating record: " . mysqli_error($conn) . "</p>";
  }

} elseif (isset($_GET['roll'])) {
  $roll = mysqli_real_escape_string($conn, $_GET['roll']);
  $sql = "SELECT * FROM studentdata WHERE roll = '$roll'";
  $result = mysqli_query($conn, $sql);
  if ($row = mysqli_fetch_assoc($result)) {
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
      <form action="editStudentData.php" method="post" align = "center">
        <input type="hidden" name="roll" value="<?php echo htmlspecialchars($row['roll']); ?>">

        <label>Full Name:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>"><br><br>

        <label>Father's Name:</label><br>
        <input type="text" name="fatherName" value="<?php echo htmlspecialchars($row['fatherName']); ?>"><br><br>

        <label>Mother's Name:</label><br>
        <input type="text" name="motherName" value="<?php echo htmlspecialchars($row['motherName']); ?>"><br><br>

        <label>Date of Birth:</label><br>
        <input type="text" name="dob" value="<?php echo htmlspecialchars($row['dob']); ?>"><br><br>

        <label>Gender:</label><br>
        <input type="text" name="gender" value="<?php echo htmlspecialchars($row['gender']); ?>"><br><br>

        <label>Present Address:</label><br>
        <textarea name="presentAddress" rows="2" cols="40"><?php echo htmlspecialchars($row['presentAddress']); ?></textarea><br><br>

        <label>Mobile:</label><br>
        <input type="text" name="mobile" value="<?php echo htmlspecialchars($row['mobile']); ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"><br><br>

        <label>Image:</label><br>
        <input type="text" name="image" value="<?php echo htmlspecialchars($row['image']); ?>"><br><br>

        <label>Faculty:</label><br>
        <input type="text" name="faculty" value="<?php echo htmlspecialchars($row['faculty']); ?>"><br><br>

        <label>Department:</label><br>
        <input type="text" name="department" value="<?php echo htmlspecialchars($row['department']); ?>"><br><br>

        <label>Hall:</label><br>
        <input type="text" name="hallName" value="<?php echo htmlspecialchars($row['hallName']); ?>"><br><br>

        <label>Roll:</label><br>
        <input type="text" name="roll" value="<?php echo htmlspecialchars($row['roll']); ?>"><br><br>

        <label>Reg. No:</label><br>
        <input type="text" name="regNo" value="<?php echo htmlspecialchars($row['regNo']); ?>"><br><br>

        <label>Session:</label><br>
        <input type="text" name="session" value="<?php echo htmlspecialchars($row['session']); ?>"><br><br>

        <button type="submit">Update</button>
      </form>
    </body>
    </html>
    <?php
  } else {
    echo "<p>Student not found.</p>";
  }
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>