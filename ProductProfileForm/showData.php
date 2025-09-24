<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Data</title>
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

$sql = "SELECT * FROM productdata";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
<h2 align="center"><u>Product Data</u></h2>
<table style="width: 100%;">
    <tr>
        <th>Product Name</th>
        <th>Product ID</th>
        <th>Product Image</th> 
        <th>Category</th>
        <th>Price</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Manufacturer</th>
        <th>Release Date</th>
        <th>Action</th>
    </tr>
<?php
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) { 
?>
    <tr>
        <td><?php echo $row["Product_Name"]; ?></td>
        <td><?php echo $row["Product_id"]; ?></td>
        <td><?php echo $row["Product_Image"]; ?></td>
        <td><?php echo $row["Category"]; ?></td>
        <td><?php echo $row["Price"]; ?></td>
        <td><?php echo $row["Description"]; ?></td>
        <td><?php echo $row["Quantity"]; ?></td>
        <td><?php echo $row["Manufacturer"]; ?></td>
        <td><?php echo $row["Release_Date"]; ?></td>
        <td><a href="editData.php?Product_id=<?php echo $row["Product_id"]; ?>">Edit</a> | 
        <a href="deleteData.php?Product_id=<?php echo $row["Product_id"]; ?>">Delete</a></td>
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