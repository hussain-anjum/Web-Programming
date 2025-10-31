<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Data</title>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>
<body>
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

$sql = "SELECT * FROM studentdata";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
<h2 align="center"><u>Student's Data</u></h2>
<table style="width: 100%;">
    <tr>
        <th>Name</th>
        <th>Father's Name</th>
        <th>Mother's Name</th> 
        <th>Date Of Birth</th>
        <th>Gender</th>
        <th>Present Address</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Image</th>
        <th>Faculty</th>
        <th>Dept.</th>
        <th>Hall</th>
        <th>Roll</th>
        <th>Reg. No</th>
        <th>Session</th>
        <th>Action</th>
    </tr>
<?php
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) { 
?>
    <tr>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["fatherName"]; ?></td>
        <td><?php echo $row["motherName"]; ?></td>
        <td><?php echo $row["dob"]; ?></td>
        <td><?php echo $row["gender"]; ?></td>
        <td><?php echo $row["presentAddress"]; ?></td>
        <td><?php echo $row["mobile"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["image"]; ?></td>
        <td><?php echo $row["faculty"]; ?></td>
        <td><?php echo $row["department"]; ?></td>
        <td><?php echo $row["hallName"]; ?></td>
        <td><?php echo $row["roll"]; ?></td>
        <td><?php echo $row["regNo"]; ?></td>
        <td><?php echo $row["session"]; ?></td>
        <td><a href="./editStudentData.php?roll=<?php echo $row["roll"]; ?>">Edit</a> | 
        <a href="./deleteStudentData.php?roll=<?php echo $row["roll"]; ?>">Delete</a></td>
    </tr>
<?php 
    } 
?>
</table>

<?php
} else {
  echo "0 results";
}
mysqli_close($conn);
?>
</body>
</html>