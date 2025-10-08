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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ID'])) {
  $id = mysqli_real_escape_string($conn, $_POST['ID']);
  $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
  $NID = mysqli_real_escape_string($conn, $_POST['NID']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $permanentAddress = mysqli_real_escape_string($conn, $_POST['permanentAddress']);
  $presentAddress = mysqli_real_escape_string($conn, $_POST['presentAddress']);
  $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $image = mysqli_real_escape_string($conn, $_POST['image']);
  $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
  $department = mysqli_real_escape_string($conn, $_POST['department']);
  $designation = mysqli_real_escape_string($conn, $_POST['designation']);
  $joiningDate = mysqli_real_escape_string($conn, $_POST['joiningDate']);
  $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
  $experience = mysqli_real_escape_string($conn, $_POST['experience']);

  $sql = "UPDATE teacherdata SET 
    fullName = '$fullName',
    NID = '$NID',
    gender = '$gender',
    permanentAddress = '$permanentAddress',
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
    echo "<p>Record updated successfully</p>";
    echo "<a href='./showTeacherData.php'>Back to Teacher List</a>";
  } else {
    echo "<p>Error updating record: " . mysqli_error($conn) . "</p>";
  }

} elseif (isset($_GET['ID'])) {
  $id = mysqli_real_escape_string($conn, $_GET['ID']);
  $sql = "SELECT * FROM teacherdata WHERE ID = '$id'";
  $result = mysqli_query($conn, $sql);
  if ($row = mysqli_fetch_assoc($result)) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit Teacher</title>
    </head>
    <body>
      <h2 align="center"><u>Edit Teacher Info</u></h2>
      <form action="editTeacherData.php" method="post">
        <input type="hidden" name="ID" value="<?php echo htmlspecialchars($row['ID']); ?>">

        <label>Full Name:</label><br>
        <input type="text" name="fullName" value="<?php echo htmlspecialchars($row['fullName']); ?>"><br><br>

        <label>NID:</label><br>
        <input type="text" name="NID" value="<?php echo htmlspecialchars($row['NID']); ?>"><br><br>

        <label>Gender:</label><br>
        <input type="text" name="gender" value="<?php echo htmlspecialchars($row['gender']); ?>"><br><br>

        <label>Permanent Address:</label><br>
        <textarea name="permanentAddress" rows="2" cols="40"><?php echo htmlspecialchars($row['permanentAddress']); ?></textarea><br><br>

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

        <label>Designation:</label><br>
        <input type="text" name="designation" value="<?php echo htmlspecialchars($row['designation']); ?>"><br><br>

        <label>Joining Date:</label><br>
        <input type="date" name="joiningDate" value="<?php echo htmlspecialchars($row['joiningDate']); ?>"><br><br>

        <label>Qualification:</label><br>
        <input type="text" name="qualification" value="<?php echo htmlspecialchars($row['qualification']); ?>"><br><br>

        <label>Experience:</label><br>
        <input type="number" name="experience" min="0" value="<?php echo htmlspecialchars($row['experience']); ?>"><br><br>

        <button type="submit">Update</button>
      </form>
    </body>
    </html>
    <?php
  } else {
    echo "<p>Teacher not found.</p>";
  }
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>