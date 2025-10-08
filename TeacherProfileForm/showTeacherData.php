<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's Data</title>
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

$sql = "SELECT * FROM teacherdata";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
<h2 align="center"><u>Teacher's Data</u></h2>
<table style="width: 100%;">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>NID</th> 
        <th>Gender</th>
        <th>Present Address</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Image</th>
        <th>Faculty</th>
        <th>Dept.</th>
        <th>Designation</th>
        <th>Joining Date</th>
        <th>Qualification</th>
        <th>Experience</th>
        <th>Action</th>
    </tr>
<?php
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) { 
?>
    <tr>
        <td><?php echo $row["ID"]; ?></td>
        <td><?php echo $row["fullName"]; ?></td>
        <td><?php echo $row["NID"]; ?></td>
        <td><?php echo $row["gender"]; ?></td>
        <td><?php echo $row["presentAddress"]; ?></td>
        <td><?php echo $row["mobile"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["image"]; ?></td>
        <td><?php echo $row["faculty"]; ?></td>
        <td><?php echo $row["department"]; ?></td>
        <td><?php echo $row["designation"]; ?></td>
        <td><?php echo $row["joiningDate"]; ?></td>
        <td><?php echo $row["qualification"]; ?></td>
        <td><?php echo $row["experience"]; ?></td>
        <td><a href="./editTeacherData.php?ID=<?php echo $row["ID"]; ?>">Edit</a> | 
        <a href="./deleteTeacherData.php?ID=<?php echo $row["ID"]; ?>">Delete</a></td>
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