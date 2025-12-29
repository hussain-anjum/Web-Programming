<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee's Data</title>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
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

$sql = "SELECT * FROM employeedata";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
<h2 align="center"><u>Employee's Information</u></h2>
<table style="width: 100%;">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Marital Status</th>
        <th>Position</th>
        <th>Company</th>
        <th>Experience (Years)</th>
        <th>Skills</th>
    </tr>
<?php
  while($row = mysqli_fetch_assoc($result)) { 
?>
    <tr>
        <td><?php echo $row["employee_id"]; ?></td>
        <td><?php echo $row["full_name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
        <td><?php echo $row["marital_status"]; ?></td>
        <td><?php echo $row["position"]; ?></td>
        <td><?php echo $row["company"]; ?></td>
        <td><?php echo $row["years_of_experience"]; ?></td>
        <td><?php echo $row["skills"]; ?></td>
    </tr>
<?php 
    } 
?>
</table>
<br>
<p align="center"><a href="index.html">Add New Employee</a></p>

<?php
} else {
  echo "<h3 align='center'>No results to show :(</h3>";
  echo "<p align='center'><a href='index.html'>Add New Employee</a></p>";
}
mysqli_close($conn);
?>
</body>
</html>